# Moodle workshop tool demonstration

The Workshop module introduces two enhancements in Moodle 2.9 related to the workshop subplugins infrastructure:

* There is a new subplugin type `workshoptool` supported.
* There are certain places in the workshop code where subplugins (of all types) can intercept the default output
  and/or data processing.

This demo subplugin illustrates the potential of some of these new features. See
[MDL-49619](https://tracker.moodle.org/browse/MDL-49619) for more details and the background.

## Warning

This subplugin is not supposed to be used in production environment. It was primarily written for testing and development purposes.
