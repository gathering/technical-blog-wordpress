#!/bin/bash
# Run before each new pod starts (migrate in the App), in /var/www/html.
#
# First the image's own start script: it copies WordPress to an empty volume
# and writes wp-config.php, and then only prints Apache's version. Then the
# theme on the volume is replaced with the one in this image. A change made
# to it in the WordPress admin is lost on the next deploy.
set -euo pipefail

docker-entrypoint.sh apache2 -v

themes=/var/www/html/wp-content/themes
name=technical-blog-wordpress
mkdir -p "$themes"

# The new copy is made under a name WordPress ignores (it starts with a
# dot), and the old one is moved aside before it is deleted. The running
# site is without its theme only between two renames. In a longer gap,
# WordPress would switch the site to a default theme for good when someone
# opened the admin's theme page. If the copy fails, the script stops before
# the theme is touched. mv -T fails instead of moving a directory into one
# of the same name.
rm -rf "$themes/.$name.new"
cp -R "/usr/src/$name" "$themes/.$name.new"
if [ -e "$themes/$name" ]; then
    mv -T "$themes/$name" "$themes/.$name.old.$(date +%s)"
fi
mv -T "$themes/.$name.new" "$themes/$name"
echo >&2 "Installed the theme $name from the image"

# The old copies go last: this one, and any an earlier run left. Each has a
# name of its own, so one that cannot be deleted, such as files owned by
# another user, never stops a deploy. It is reported until someone deletes
# it.
for old in "$themes/.$name.old".*; do
    [ -e "$old" ] || continue
    rm -rf "$old" 2>/dev/null || echo >&2 "Could not delete $old: delete it by hand"
done
