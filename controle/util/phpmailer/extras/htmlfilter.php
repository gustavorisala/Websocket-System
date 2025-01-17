<?php

/**
 * htmlfilter.inc
 * ---------------
 * This set of functions allows you to filter html in order to remove
 * any malicious tags from it. Useful in cases when you need to filter
 * user input for any cross-site-scripting attempts.
 *
 * Copyright (C) 2002-2004 by Duke University
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.	 See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  
 * 02110-1301  USA
 *
 * @Author	Konstantin Riabitsev <icon@linux.duke.edu>
 * @Version 1.1 ($Date: 2011-07-04 14:02:23 -0400 (Mon, 04 Jul 2011) $)
 */

/**
 *
 * @author Jim Jagielski <jim@jaguNET.com / jimjag@gmail.com>
 */

/**
 * This function returns the final tag out of the tag name, an array
 * of attributes, and the type of the tag.
 * This function is called by
 * tln_sanitize internally.
 */
function tln_tagprint($tagname, $attary, $tagtype)
{
    $me = 'tln_tagprint';
    if ($tagtype == 2) {
        $fulltag = '</' . $tagname . '>';
    } else {
        $fulltag = '<' . $tagname;
        if (is_array($attary) && sizeof($attary)) {
            $atts = Array();
            while (list ($attname, $attvalue) = each($attary)) {
                array_push($atts, "$attname=$attvalue");
            }
            $fulltag .= ' ' . join(' ', $atts);
        }
        if ($tagtype == 3) {
            $fulltag .= ' /';
        }
        $fulltag .= '>';
    }
    return $fulltag;
}

function tln_casenormalize(&$val)
{
    $val = strtolower($val);
}

function tln_skipspace($body, $offset)
{
    $me = 'tln_skipspace';
    preg_match('/^(\s*)/s', substr($body, $offset), $matches);
    if (sizeof($matches[1])) {
        $count = strlen($matches[1]);
        $offset += $count;
    }
    return $offset;
}

function tln_findnxstr($body, $offset, $needle)
{
    $me = 'tln_findnxstr';
    $pos = strpos($body, $needle, $offset);
    if ($pos === FALSE) {
        $pos = strlen($body);
    }
    return $pos;
}

function tln_findnxreg($body, $offset, $reg)
{
    $me = 'tln_findnxreg';
    $matches = Array();
    $retarr = Array();
    $preg_rule = '%^(.*?)(' . $reg . ')%s';
    preg_match($preg_rule, substr($body, $offset), $matches);
    if (! isset($matches[0])) {
        $retarr = false;
    } else {
        $retarr[0] = $offset + strlen($matches[1]);
        $retarr[1] = $matches[1];
        $retarr[2] = $matches[2];
    }
    return $retarr;
}

function tln_getnxtag($body, $offset)
{
    $me = 'tln_getnxtag';
    if ($offset > strlen($body)) {
        return false;
    }
    $lt = tln_findnxstr($body, $offset, '<');
    if ($lt == strlen($body)) {
        return false;
    }
    /**
     * We are here:
     * blah blah <tag attribute="value">
     * \---------^
     */
    $pos = tln_skipspace($body, $lt + 1);
    if ($pos >= strlen($body)) {
        return Array(
            false,
            false,
            false,
            $lt,
            strlen($body)
        );
    }
    /**
     * There are 3 kinds of tags:
     * 1.
     * Opening tag, e.g.:
     * <a href="blah">
     * 2. Closing tag, e.g.:
     * </a>
     * 3. XHTML-style content-less tag, e.g.:
     * <img src="blah"/>
     */
    $tagtype = false;
    switch (substr($body, $pos, 1)) {
        case '/':
            $tagtype = 2;
            $pos ++;
            break;
        case '!':
            /**
             * A comment or an SGML declaration.
             */
            if (substr($body, $pos + 1, 2) == '--') {
                $gt = strpos($body, '-->', $pos);
                if ($gt === false) {
                    $gt = strlen($body);
                } else {
                    $gt += 2;
                }
                return Array(
                    false,
                    false,
                    false,
                    $lt,
                    $gt
                );
            } else {
                $gt = tln_findnxstr($body, $pos, '>');
                return Array(
                    false,
                    false,
                    false,
                    $lt,
                    $gt
                );
            }
            break;
        default:
            /**
             * Assume tagtype 1 for now.
             * If it's type 3, we'll switch values
             * later.
             */
            $tagtype = 1;
            break;
    }

    $tag_start = $pos;
    $tagname = '';
    /**
     * Look for next [\W-_], which will indicate the end of the tag name.
     */
    $regary = tln_findnxreg($body, $pos, '[^\w\-_]');
    if ($regary == false) {
        return Array(
            false,
            false,
            false,
            $lt,
            strlen($body)
        );
    }
    list ($pos, $tagname, $match) = $regary;
    $tagname = strtolower($tagname);

    /**
     * $match can be either of these:
     * '>' indicating the end of the tag entirely.
     * '\s' indicating the end of the tag name.
     * '/' indicating that this is type-3 xhtml tag.
     *
     * Whatever else we find there indicates an invalid tag.
     */
    switch ($match) {
        case '/':
            /**
             * This is an xhtml-style tag with a closing / at the
             * end, like so: <img src="blah"/>.
             * Check if it's followed
             * by the closing bracket. If not, then this tag is invalid
             */
            if (substr($body, $pos, 2) == '/>') {
                $pos ++;
                $tagtype = 3;
            } else {
                $gt = tln_findnxstr($body, $pos, '>');
                $retary = Array(
                    false,
                    false,
                    false,
                    $lt,
                    $gt
                );
                return $retary;
            }
        case '>':
            return Array(
                $tagname,
                false,
                $tagtype,
                $lt,
                $pos
            );
            break;
        default:
            /**
             * Check if it's whitespace
             */
            if (preg_match('/\s/', $match)) {} else {
                /**
                 * This is an invalid tag! Look for the next closing ">".
                 */
                $gt = tln_findnxstr($body, $lt, '>');
                return Array(
                    false,
                    false,
                    false,
                    $lt,
                    $gt
                );
            }
    }

    /**
     * At this point we're here:
     * <tagname attribute='blah'>
     * \-------^
     *
     * At this point we loop in order to find all attributes.
     */
    $attname = '';
    $atttype = false;
    $attary = Array();

    while ($pos <= strlen($body)) {
        $pos = tln_skipspace($body, $pos);
        if ($pos == strlen($body)) {
            /**
             * Non-closed tag.
             */
            return Array(
                false,
                false,
                false,
                $lt,
                $pos
            );
        }
        /**
         * See if we arrived at a ">" or "/>", which means that we reached
         * the end of the tag.
         */
        $matches = Array();
        preg_match('%^(\s*)(>|/>)%s', substr($body, $pos), $matches);
        if (isset($matches[0]) && $matches[0]) {
            /**
             * Yep.
             * So we did.
             */
            $pos += strlen($matches[1]);
            if ($matches[2] == '/>') {
                $tagtype = 3;
                $pos ++;
            }
            return Array(
                $tagname,
                $attary,
                $tagtype,
                $lt,
                $pos
            );
        }

        /**
         * There are several types of attributes, with optional
         * [:space:] between members.
         * Type 1:
         * attrname[:space:]=[:space:]'CDATA'
         * Type 2:
         * attrname[:space:]=[:space:]"CDATA"
         * Type 3:
         * attr[:space:]=[:space:]CDATA
         * Type 4:
         * attrname
         *
         * We leave types 1 and 2 the same, type 3 we check for
         * '"' and convert to "&quot" if needed, then wrap in
         * double quotes. Type 4 we convert into:
         * attrname="yes".
         */
        $regary = tln_findnxreg($body, $pos, '[^\w\-_]');
        if ($regary == false) {
            /**
             * Looks like body ended before the end of tag.
             */
            return Array(
                false,
                false,
                false,
                $lt,
                strlen($body)
            );
        }
        list ($pos, $attname, $match) = $regary;
        $attname = strtolower($attname);
        /**
         * We arrived at the end of attribute name.
         * Several things possible
         * here:
         * '>' means the end of the tag and this is attribute type 4
         * '/' if followed by '>' means the same thing as above
         * '\s' means a lot of things -- look what it's followed by.
         * anything else means the attribute is invalid.
         */
        switch ($match) {
            case '/':
                /**
                 * This is an xhtml-style tag with a closing / at the
                 * end, like so: <img src="blah"/>.
                 * Check if it's followed
                 * by the closing bracket. If not, then this tag is invalid
                 */
                if (substr($body, $pos, 2) == '/>') {
                    $pos ++;
                    $tagtype = 3;
                } else {
                    $gt = tln_findnxstr($body, $pos, '>');
                    $retary = Array(
                        false,
                        false,
                        false,
                        $lt,
                        $gt
                    );
                    return $retary;
                }
            case '>':
                $attary{$attname} = '"yes"';
                return Array(
                    $tagname,
                    $attary,
                    $tagtype,
                    $lt,
                    $pos
                );
                break;
            default:
                /**
                 * Skip whitespace and see what we arrive at.
                 */
                $pos = tln_skipspace($body, $pos);
                $char = substr($body, $pos, 1);
                /**
                 * Two things are valid here:
                 * '=' means this is attribute type 1 2 or 3.
                 * \w means this was attribute type 4.
                 * anything else we ignore and re-loop. End of tag and
                 * invalid stuff will be caught by our checks at the beginning
                 * of the loop.
                 */
                if ($char == '=') {
                    $pos ++;
                    $pos = tln_skipspace($body, $pos);
                    /**
                     * Here are 3 possibilities:
                     * "'" attribute type 1
                     * '"' attribute type 2
                     * everything else is the content of tag type 3
                     */
                    $quot = substr($body, $pos, 1);
                    if ($quot == '\'') {
                        $regary = tln_findnxreg($body, $pos + 1, '\'');
                        if ($regary == false) {
                            return Array(
                                false,
                                false,
                                false,
                                $lt,
                                strlen($body)
                            );
                        }
                        list ($pos, $attval, $match) = $regary;
                        $pos ++;
                        $attary{$attname} = '\'' . $attval . '\'';
                    } else if ($quot == '"') {
                        $regary = tln_findnxreg($body, $pos + 1, '\"');
                        if ($regary == false) {
                            return Array(
                                false,
                                false,
                                false,
                                $lt,
                                strlen($body)
                            );
                        }
                        list ($pos, $attval, $match) = $regary;
                        $pos ++;
                        $attary{$attname} = '"' . $attval . '"';
                    } else {
                        /**
                         * These are hateful.
                         * Look for \s, or >.
                         */
                        $regary = tln_findnxreg($body, $pos, '[\s>]');
                        if ($regary == false) {
                            return Array(
                                false,
                                false,
                                false,
                                $lt,
                                strlen($body)
                            );
                        }
                        list ($pos, $attval, $match) = $regary;
                        /**
                         * If it's ">" it will be caught at the top.
                         */
                        $attval = preg_replace('/\"/s', '&quot;', $attval);
                        $attary{$attname} = '"' . $attval . '"';
                    }
                } else if (preg_match('|[\w/>]|', $char)) {
                    /**
                     * That was attribute type 4.
                     */
                    $attary{$attname} = '"yes"';
                } else {
                    /**
                     * An illegal character.
                     * Find next '>' and return.
                     */
                    $gt = tln_findnxstr($body, $pos, '>');
                    return Array(
                        false,
                        false,
                        false,
                        $lt,
                        $gt
                    );
                }
        }
    }
    /**
     * The fact that we got here indicates that the tag end was never
     * found.
     * Return invalid tag indication so it gets stripped.
     */
    return Array(
        false,
        false,
        false,
        $lt,
        strlen($body)
    );
}

function tln_deent(&$attvalue, $regex, $hex = false)
{
    $me = 'tln_deent';
    $ret_match = false;
    preg_match_all($regex, $attvalue, $matches);
    if (is_array($matches) && sizeof($matches[0]) > 0) {
        $repl = Array();
        for ($i = 0; $i < sizeof($matches[0]); $i ++) {
            $numval = $matches[1][$i];
            if ($hex) {
                $numval = hexdec($numval);
            }
            $repl{$matches[0][$i]} = chr($numval);
        }
        $attvalue = strtr($attvalue, $repl);
        return true;
    } else {
        return false;
    }
}

function tln_defang(&$attvalue)
{
    $me = 'tln_defang';
    /**
     * Skip this if there aren't ampersands or backslashes.
     */
    if (strpos($attvalue, '&') === false && strpos($attvalue, '\\') === false) {
        return;
    }
    $m = false;
    do {
        $m = false;
        $m = $m || tln_deent($attvalue, '/\&#0*(\d+);*/s');
        $m = $m || tln_deent($attvalue, '/\&#x0*((\d|[a-f])+);*/si', true);
        $m = $m || tln_deent($attvalue, '/\\\\(\d+)/s', true);
    } while ($m == true);
    $attvalue = stripslashes($attvalue);
}

function tln_unspace(&$attvalue)
{
    $me = 'tln_unspace';
    if (strcspn($attvalue, "\t\r\n\0 ") != strlen($attvalue)) {
        $attvalue = str_replace(Array(
            "\t",
            "\r",
            "\n",
            "\0",
            " "
        ), Array(
            '',
            '',
            '',
            '',
            ''
        ), $attvalue);
    }
}

function tln_fixatts($tagname, $attary, $rm_attnames, $bad_attvals, $add_attr_to_tag)
{
    $me = 'tln_fixatts';
    while (list ($attname, $attvalue) = each($attary)) {
        /**
         * See if this attribute should be removed.
         */
        foreach ($rm_attnames as $matchtag => $matchattrs) {
            if (preg_match($matchtag, $tagname)) {
                foreach ($matchattrs as $matchattr) {
                    if (preg_match($matchattr, $attname)) {
                        unset($attary{$attname});
                        continue;
                    }
                }
            }
        }
        /**
         * Remove any backslashes, entities, or extraneous whitespace.
         */
        tln_defang($attvalue);
        tln_unspace($attvalue);

        /**
         * Now let's run checks on the attvalues.
         * I don't expect anyone to comprehend this. If you do,
         * get in touch with me so I can drive to where you live and
         * shake your hand personally. :)
         */
        foreach ($bad_attvals as $matchtag => $matchattrs) {
            if (preg_match($matchtag, $tagname)) {
                foreach ($matchattrs as $matchattr => $valary) {
                    if (preg_match($matchattr, $attname)) {
                        /**
                         * There are two arrays in valary.
                         * First is matches.
                         * Second one is replacements
                         */
                        list ($valmatch, $valrepl) = $valary;
                        $newvalue = preg_replace($valmatch, $valrepl, $attvalue);
                        if ($newvalue != $attvalue) {
                            $attary{$attname} = $newvalue;
                        }
                    }
                }
            }
        }
    }
    /**
     * See if we need to append any attributes to this tag.
     */
    foreach ($add_attr_to_tag as $matchtag => $addattary) {
        if (preg_match($matchtag, $tagname)) {
            $attary = array_merge($attary, $addattary);
        }
    }
    return $attary;
}

function tln_sanitize($body, $tag_list, $rm_tags_with_content, $self_closing_tags, $force_tag_closing, $rm_attnames, $bad_attvals, $add_attr_to_tag)
{
    $me = 'tln_sanitize';
    /**
     * Normalize rm_tags and rm_tags_with_content.
     */
    $rm_tags = array_shift($tag_list);
    @array_walk($tag_list, 'tln_casenormalize');
    @array_walk($rm_tags_with_content, 'tln_casenormalize');
    @array_walk($self_closing_tags, 'tln_casenormalize');
    /**
     * See if tag_list is of tags to remove or tags to allow.
     * false means remove these tags
     * true means allow these tags
     */
    $curpos = 0;
    $open_tags = Array();
    $trusted = "<!-- begin tln_sanitized html -->\n";
    $skip_content = false;
    /**
     * Take care of netscape's stupid javascript entities like
     * &{alert('boo')};
     */
    $body = preg_replace('/&(\{.*?\};)/si', '&amp;\\1', $body);
    while (($curtag = tln_getnxtag($body, $curpos)) != FALSE) {
        list ($tagname, $attary, $tagtype, $lt, $gt) = $curtag;
        $free_content = substr($body, $curpos, $lt - $curpos);
        if ($skip_content == false) {
            $trusted .= $free_content;
        } else {}
        if ($tagname != FALSE) {
            if ($tagtype == 2) {
                if ($skip_content == $tagname) {
                    /**
                     * Got to the end of tag we needed to remove.
                     */
                    $tagname = false;
                    $skip_content = false;
                } else {
                    if ($skip_content == false) {
                        if (isset($open_tags{$tagname}) && $open_tags{$tagname} > 0) {
                            $open_tags{$tagname} --;
                        } else {
                            $tagname = false;
                        }
                    } else {}
                }
            } else {
                /**
                 * $rm_tags_with_content
                 */
                if ($skip_content == false) {
                    /**
                     * See if this is a self-closing type and change
                     * tagtype appropriately.
                     */
                    if ($tagtype == 1 && in_array($tagname, $self_closing_tags)) {
                        $tagtype = 3;
                    }
                    /**
                     * See if we should skip this tag and any content
                     * inside it.
                     */
                    if ($tagtype == 1 && in_array($tagname, $rm_tags_with_content)) {
                        $skip_content = $tagname;
                    } else {
                        if (($rm_tags == false && in_array($tagname, $tag_list)) || ($rm_tags == true && ! in_array($tagname, $tag_list))) {
                            $tagname = false;
                        } else {
                            if ($tagtype == 1) {
                                if (isset($open_tags{$tagname})) {
                                    $open_tags{$tagname} ++;
                                } else {
                                    $open_tags{$tagname} = 1;
                                }
                            }
                            /**
                             * This is where we run other checks.
                             */
                            if (is_array($attary) && sizeof($attary) > 0) {
                                $attary = tln_fixatts($tagname, $attary, $rm_attnames, $bad_attvals, $add_attr_to_tag);
                            }
                        }
                    }
                } else {}
            }
            if ($tagname != false && $skip_content == false) {
                $trusted .= tln_tagprint($tagname, $attary, $tagtype);
            }
        } else {}
        $curpos = $gt + 1;
    }
    $trusted .= substr($body, $curpos, strlen($body) - $curpos);
    if ($force_tag_closing == true) {
        foreach ($open_tags as $tagname => $opentimes) {
            while ($opentimes > 0) {
                $trusted .= '</' . $tagname . '>';
                $opentimes --;
            }
        }
        $trusted .= "\n";
    }
    $trusted .= "<!-- end tln_sanitized html -->\n";
    return $trusted;
}

//
// Use the nifty htmlfilter library
//
function HTMLFilter($body, $trans_image_path, $block_external_images = false)
{
    $tag_list = Array(
        false,
        "object",
        "meta",
        "html",
        "head",
        "base",
        "link",
        "frame",
        "iframe",
        "plaintext",
        "marquee"
    );

    $rm_tags_with_content = Array(
        "script",
        "applet",
        "embed",
        "title",
        "frameset",
        "xmp",
        "xml"
    );

    $self_closing_tags = Array(
        "img",
        "br",
        "hr",
        "input",
        "outbind"
    );

    $force_tag_closing = true;

    $rm_attnames = Array(
        "/.*/" => Array(
            // "/target/i",
            "/^on.*/i",
            "/^dynsrc/i",
            "/^data.*/i",
            "/^lowsrc.*/i"
        )
    );

    $bad_attvals = Array(
        "/.*/" => Array(
            "/^src|background/i" => Array(
                Array(
                    "/^([\'\"])\s*\S+script\s*:.*([\'\"])/si",
                    "/^([\'\"])\s*mocha\s*:*.*([\'\"])/si",
                    "/^([\'\"])\s*about\s*:.*([\'\"])/si"
                ),
                Array(
                    "\\1$trans_image_path\\2",
                    "\\1$trans_image_path\\2",
                    "\\1$trans_image_path\\2",
                    "\\1$trans_image_path\\2"
                )
            ),
            "/^href|action/i" => Array(
                Array(
                    "/^([\'\"])\s*\S+script\s*:.*([\'\"])/si",
                    "/^([\'\"])\s*mocha\s*:*.*([\'\"])/si",
                    "/^([\'\"])\s*about\s*:.*([\'\"])/si"
                ),
                Array(
                    "\\1#\\1",
                    "\\1#\\1",
                    "\\1#\\1",
                    "\\1#\\1"
                )
            ),
            "/^style/i" => Array(
                Array(
                    "/expression/i",
                    "/binding/i",
                    "/behaviou*r/i",
                    "/include-source/i",
                    "/position\s*:\s*absolute/i",
                    "/url\s*\(\s*([\'\"])\s*\S+script\s*:.*([\'\"])\s*\)/si",
                    "/url\s*\(\s*([\'\"])\s*mocha\s*:.*([\'\"])\s*\)/si",
                    "/url\s*\(\s*([\'\"])\s*about\s*:.*([\'\"])\s*\)/si",
                    "/(.*)\s*:\s*url\s*\(\s*([\'\"]*)\s*\S+script\s*:.*([\'\"]*)\s*\)/si"
                ),
                Array(
                    "idiocy",
                    "idiocy",
                    "idiocy",
                    "idiocy",
                    "",
                    "url(\\1#\\1)",
                    "url(\\1#\\1)",
                    "url(\\1#\\1)",
                    "url(\\1#\\1)",
                    "url(\\1#\\1)",
                    "\\1:url(\\2#\\3)"
                )
            )
        )
    );

    if ($block_external_images) {
        array_push($bad_attvals{'/.*/'}{'/^src|background/i'}[0], '/^([\'\"])\s*https*:.*([\'\"])/si');
        array_push($bad_attvals{'/.*/'}{'/^src|background/i'}[1], "\\1$trans_image_path\\1");
        array_push($bad_attvals{'/.*/'}{'/^style/i'}[0], '/url\(([\'\"])\s*https*:.*([\'\"])\)/si');
        array_push($bad_attvals{'/.*/'}{'/^style/i'}[1], "url(\\1$trans_image_path\\1)");
    }

    $add_attr_to_tag = Array(
        "/^a$/i" => Array(
            'target' => '"_blank"'
        )
    );

    $trusted = tln_sanitize($body, $tag_list, $rm_tags_with_content, $self_closing_tags, $force_tag_closing, $rm_attnames, $bad_attvals, $add_attr_to_tag);
    return $trusted;
}

?>
