Easily Gzip your production application's HTML output with the Gzip Component Plugin

## Background
I was attempting to optimize some small sites according to what YSlow said was inefficient, and saw some code at debuggable.com (http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb) that mentioned gzipping html output. So I wrapped that into a method in the AppController and used it in Production.

Not happy with copy-pasting that one method each and every time, I refactored it into a Component (woohoo CakePHP Components!), which I've just now refactored as a plugin. Thats a lot of refactoring.

This plugin only works on HTML, so YMMV.

## Installation
- Clone from github : in your plugin directory type `git clone git://github.com/josegonzalez/gzip-component.git gzip`
- Add as a git submodule : in your plugin directory type `git submodule add git://github.com/josegonzalez/gzip-component.git gzip`
- Download an archive from github and extract it in `/plugins/gzip`

## Usage
1. Include the component in your controller (AppController or otherwise)
	var $components = array('Gzip.Gzip');

At this point, everything should theoretically work.

## Notes
Due to the way CakePHP does output buffering, this will only work when debug is less than 2.

## TODO:
1. Gzip more than just HTML
2. Other, configurable methods of compression
3. Turn off compression via a url param or a secret url
