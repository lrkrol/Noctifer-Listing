<!DOCTYPE html>

<!--
Noctifer Directory Listing Script 1.11
Copyright 2014, 2015, 2018 Laurens R Krol
noctifer.net, lrkrol.com

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<?php
error_reporting(0);


### configuration ###

# the image to show (if true) in the top right corner, and where clicking it should lead
# note: the header image background takes the same colour as the current scheme. have your
# logo in the negative space of a transparent PNG to make use of this effect.
# the image can either be a URL or data. 
$useHeaderImage = true;
$headerImage = "data:image/png;base64,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";
$headerImageLink = "https://noctifer.net";

# possible web site colours; one will be selected randomly at each page load
$colours = array(
        "#006f8f",
        "#00bb22",
        "#f67300",
        "#94b400",
        "#b43104",
        "#5c268a",
        "#096fab",
        "#ab097c",
        "#0092c2",
        "#9a8267");

# whether or not to insert this script into subdirectories when no other
# index file is present, and array of directories not to copy to.
# blacklisted directories (see next) are always excluded.
$copyToSubs = true;
$copyToSubsExcluded = array("excltest", "old");

# list of directory or file names not to list by the script
$blacklistArray = array(".git");

# blacklist file name
$blacklistFile = ".blacklist";

/*
the blacklist file should contain one file or directory name per line;
these files/directories will not be listed by the script.
to protect the blacklist file itself from being read by outsiders,
use a .htaccess file in the same directory as the blacklist file:

<Files ".blacklist">
    Order allow,deny
    Deny from all
</Files>

where .blacklist is the name of the blacklist file.

you can use either the blacklistArray, the blacklistFile, or both.
*/


### main script ###

# initialising variables
$thisScript = basename(__FILE__);
$thisDir = str_replace('/'.$thisScript, '', $_SERVER['SCRIPT_NAME']);
$fileList = array();
$dirList = array();
$dirSize = 0;

# checking if the blacklist file exists, reading it into array
if (file_exists($blacklistFile)) {
    $blacklist = array_merge($blacklistArray, file($blacklistFile, FILE_IGNORE_NEW_LINES));
}


# reading directory
if ($dh = opendir('.')) {
    while (($itemName = readdir ($dh))) {
        # ignoring certain files, and all files on the blacklist                
        if ($itemName != "." && $itemName != ".." && $itemName != $thisScript
                && $itemName != ".htpasswd" && $itemName != ".htaccess"
                && $itemName != $blacklistFile && !in_array($itemName, $blacklist)) {
            if (is_file($itemName)) {
                # file: adding file information to file array
                $stat = stat($itemName);
                $info = pathinfo($itemName);

                
                $fileList[] = array(
                    'name'  => $info['filename'],
                    'ext'   => $info['extension'],
                    'size'  => setSize($stat['size'], 2),
                    'date'  => date("Y-m-d, H:i", $stat['mtime'])
                );

                # adding size to total directory size
                $dirSize += filesize($itemName);
            } else if (is_dir($itemName)) {
                # directory: adding directory information to directory array
                $stat = stat($itemName);

                $dirList[] = array(
                    'name'  => $itemName,
                    'date'  => date("Y-m-d, H:i", $stat['mtime'])
                );

                # copying script to subdirectory if no index file is present
                if ( $copyToSubs && !is_file( $itemName . DIRECTORY_SEPARATOR . "index.php" )
                                 && !is_file( $itemName . DIRECTORY_SEPARATOR . "index.html" )
                                 && !is_file( $itemName . DIRECTORY_SEPARATOR . "index.htm" )
                                 && !in_array( $itemName, $copyToSubsExcluded ) ) {
                    copy("index.php", $itemName . DIRECTORY_SEPARATOR . "index.php");
                }
            }
        }
    }
}
closedir($dh);

# sorting lists alphabetically
usort($fileList, 'compareName');
usort($dirList, 'compareName');

# formatting directory size
$dirSize = setSize($dirSize, 2);

# selecting a colour for the layout
$colour = $colours[array_rand($colours)];

function setSize($size, $decimals) {
    # translating size in bytes into more readable string
    $scale = array('B ', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $scaleCount = 0;

    while ($size > 1024) {
        $size /= 1024;
        $scaleCount++;
    }

    return sprintf("%.2f %s", $size, $scale[$scaleCount]);
}

function compareName($a, $b) {
    # name comparison for usort
    return strnatcasecmp($a['name'], $b['name']);
}

?>
<html lang="">
<head>
    <meta charset="utf-8" />
    
    <title><?php echo "directory: " . ($thisDir == '' ? "/" : $thisDir); ?></title>

    <meta name="description" content="directory index listing at <?php echo $_SERVER['HTTP_HOST'] ?>">
    <meta name="author" content="Laurens R Krol" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" id="viewport" />
    
    <style>
        html, body {
                width: 100%;
                margin: 0px; padding: 0px;
                background: white;
                font-size: small;
                font-family: sans-serif; }

        #header {
                width: 50%;
                min-width: 500px;
                margin: 15px auto 0px auto;
                display: table; }

            #header img {
                    display: table-cell;
                    vertical-align: bottom;
                    background: <?php echo $colour; ?>; }

            #path {
                    color: <?php echo $colour; ?>;
                    width: 100%;
                    display: table-cell;
                    vertical-align: bottom;
                    white-space: pre-wrap;
                    text-indent: -40px; padding-left: 40px; }

                #path a {
                        padding-top: 1px;
                        color: <?php echo $colour; ?>;
                        text-decoration: none; }

                    #path a:hover {
                            color: white;
                            background: <?php echo $colour; ?>; }

                    #activedir {
                            padding-top: 1px;
                            color: white;
                            white-space: nowrap;
                            font-weight: bold;
                            background: <?php echo $colour; ?>; }

                    #path a:hover ~ #activedir {
                            color: <?php echo $colour; ?>;
                            background: white; }


        #container {
                width: 50%;
                min-width: 500px;
                margin: 0px auto; padding: 5px;
                clear: both;
                overflow: visible;
                border: 3px solid <?php echo $colour; ?>; }

            table {
                    width: 100%;
                    margin: 0px;
                    border-collapse: collapse; }

                tr {
                        border-bottom: 1px solid #efefef; }

                    tr:hover {
                            background: <?php echo $colour; ?>;
                            color: white; }

                    tr:hover > td .filesymbol
                            {   color: white; }

                    tr:hover > td .filenameext
                            {   color: white; }

                table tr td a {
                        height: 100%;
                        display: block;
                        color: inherit;
                        text-decoration: none; }

                .dir {
                        background: #f0f0f0;
                        border-bottom: 1px solid #e4e4e4; }

                .filesymbol {
                        padding-right: 3px;
                        font-family: monospace;
                        color: <?php echo $colour; ?>; }

                .filename {
                        width: 100%;
                        word-break: break-all;
                        text-indent: -1em;
                        padding-left: 1.5em; }

                .filenameext {
                        font-style: italic;
                        color: <?php echo $colour; ?>;
                        word-break: keep-all; }

                .fileexttd {
                        text-align: center; }

                .filesize {
                        padding-left: 10px;
                        white-space: pre;
                        text-align: right; }

                .filesizescale {
                        padding-left: 5px;
                        text-align: left; }

                .filedate {
                        padding-left: 10px;
                        text-align: right;}

        .nowrap {
                white-space: nowrap; }

        #footer {
                width: 50%; height: 48px;
                min-width: 500px;
                text-align: center;
                font-size: x-small;
                color: <?php echo $colour; ?>;
                margin: 0px auto 15px auto; }

        @media screen and (max-width: 800px) {
            body { font-size: medium; }
            #header { height: auto; margin-top: .5em;}
            #header, #container, #footer { width: 90%; min-width: auto; }
            #logo, .filesize, .filesizescale, .filedate { display: none; }
        }
    </style>
</head>

<body>

<div id="header">
    <div id="path"><?php
            # decomposing path, reverse order to make linking easier
            $path = array_reverse(explode('/', $thisDir));

            for ($i = sizeof($path) - 1; $i != -1; $i--) {
                # giving the root a name, to be clickable
                if ($path[$i] == "") $path[$i] = "root";

                if ($i == 0) {
                    # markup for currently active directory
                    echo "<span id=\"activedir\">&nbsp;/{$path[$i]} </span>";
                } else { 
                    # linking to directory
                    echo "<a href=\"" . str_repeat("../", rawurlencode($i)) . "\">&nbsp;/{$path[$i]} </a>";
                }
            }
        ?>&nbsp;<span class="nowrap">(<?php echo trim($dirSize); ?>)</span></div>
    <?php if ( $useHeaderImage ) { echo "<div id=\"logo\"><a href=\"$headerImageLink\"><img src=\"$headerImage\" alt=\"\" /></a></div>\n"; } ?>
</div>
<div id="container">
<?php
    # checking array sizes
    if (sizeof($dirList) == 0 && sizeof($fileList) == 0) {
        # no directories or files in the arrays
        echo "    <i>this directory is empty</i>\n";
    } else {
        echo "    <table>";
        # linking to directories
        foreach ($dirList as $dir) {
            echo "\n        <tr class=\"dir\">\n";
            echo "           <td class=\"filename\"><a href=\"" . rawurlencode($dir['name']) . "\"><span class=\"filesymbol\">&#x25ba;</span> {$dir['name']}</a></td>\n";
            echo "           <td class=\"filesize\"><a href=\"" . rawurlencode($dir['name']) . "\"></a></td>\n";
            echo "           <td class=\"filesizescale\"><a href=\"" . rawurlencode($dir['name']) . "\"></a></td>\n";
            echo "           <td class=\"filedate nowrap\"><a href=\"" . rawurlencode($dir['name']) . "\">{$dir['date']}</a></td>\n";
            echo "        </tr>";
        }

        # linking to files
        foreach ($fileList as $file) {
            $link = $file['name'] . ($file['ext'] == "" ? "" : "." . $file['ext']);

            echo "\n        <tr>\n";
            echo "           <td class=\"filename\"><a href=\"" . urlencode($link) . "\"><span class=\"filesymbol\">&#x25a1;</span> {$file['name']}" .  ($file['ext'] == "" ? "" : " <span class=\"filenameext\">{$file['ext']}</span>") . "</a></td>\n";
            echo "           <td class=\"filesize\"><a href=\"" . urlencode($link) . "\">" . substr($file['size'], 0, -3) . "</a></td>\n";
            echo "           <td class=\"filesizescale\"><a href=\"" . urlencode($link) . "\">" . substr($file['size'], -2, 2) . "</a></td>\n";
            echo "           <td class=\"filedate nowrap\"><a href=\"" . urlencode($link) . "\">{$file['date']}</a></td>\n";
            echo "        </tr>";
        }
        echo "\n    </table>\n";
    }
?>
</div>
<div id="footer"><?php echo $colour ?></div>

</body>
</html>