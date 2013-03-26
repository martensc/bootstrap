# Twitter Bootstrap theme for Drupal

This is an altered version of the Bootstrap Drupal module. We've basically made some simple changes that are important for the type of work we're doing.

## Instructions

1. Open up terminal and run the command `gem install bootstrap-sass`. This will install the Compass / Bootstrap gem needed for this theme.
2. Once you have the bootstrap partials in-place, you can run `compass watch` on the root of your theme. This will generate the style.css file in your css directory.

## Pull in Upstream Changes

1. git remote add upstream --track 7.x-2.x http://git.drupal.org/project/bootstrap.git
2. git pull upstream 7.x-2.x

Original Author: http://drupal.org/node/259843/committers
