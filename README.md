# Noctifer Directory Listing Script
This is a PHP script to replace your default directory index listing.

* Lists all files and directories along with, where appropriate, their sizes and modification dates.
* Also lists total size of the current directory's contents.
* Individual files and directories can be blacklisted by listing them either in a separate blacklist file in each directory, or in the script itself. Blacklisted files will not be listed or considered by the script.
* Breadcrumbs show and allow quick access to upper levels.
* The script can automatically copy itself to the subdirectories it finds that do not yet have an index file. Individual directories can be excluded from this behaviour.
* A responsive design shows only a minimal index listing on mobile devices, with no size or date information.
* Has room for a personalised logo. (Hidden on mobile.)
* Total file size is about 18 kB. This includes an inline base64 PNG standard logo of about 5 kB which can of course be removed for slightly faster loading times.
* Has a bunch of funky colours.

[Here is an online example.](https://files.noctifer.net/upload)