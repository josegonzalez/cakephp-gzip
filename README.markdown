[![Build Status](https://travis-ci.org/josegonzalez/cakephp-gzip.png?branch=master)](https://travis-ci.org/josegonzalez/cakephp-gzip) [![Coverage Status](https://coveralls.io/repos/josegonzalez/cakephp-gzip/badge.png?branch=master)](https://coveralls.io/r/josegonzalez/cakephp-gzip?branch=master) [![Total Downloads](https://poser.pugx.org/josegonzalez/cakephp-gzip/d/total.png)](https://packagist.org/packages/josegonzalez/cakephp-gzip) [![Latest Stable Version](https://poser.pugx.org/josegonzalez/cakephp-gzip/v/stable.png)](https://packagist.org/packages/josegonzalez/cakephp-gzip)

# Gzip Component

Easily Gzip your production application's HTML output with the Gzip Component Plugin

## Background

I was attempting to optimize some small sites according to what YSlow said was inefficient, and saw some code at [debuggable.com](http://debuggable.com/posts/issues-with-output-buffering-in-cakephp:480f4dd5-b4fc-42a7-a5ab-4544cbdd56cb) that mentioned gzipping html output. So I wrapped that into a method in the AppController and used it in Production.

Not happy with copy-pasting that one method each and every time, I refactored it into a Component (woo-hoo CakePHP Components!), which I've just now refactored as a plugin. Thats a lot of refactoring.

This plugin only works on HTML, so YMMV.

## Installation

_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

    {
        "require": {
            "josegonzalez/cakephp-gzip": "dev-master"
        }
    }

Because this plugin has the type `cakephp-plugin` set in it's own `composer.json`, composer knows to install it inside your `/Plugins` directory, rather than in the usual vendors file. It is recommended that you add `/Plugins/Upload` to your .gitignore file. (Why? [read this](http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md).)

_[Manual]_

* Download this: [https://github.com/josegonzalez/cakephp-gzip/zipball/master](https://github.com/josegonzalez/cakephp-gzip/zipball/master)
* Unzip that download.
* Copy the resulting folder to `app/Plugin`
* Rename the folder you just copied to `Gzip`

_[GIT Submodule]_

In your app directory type:

    git submodule add git://github.com/josegonzalez/cakephp-gzip.git Plugin/Gzip
    git submodule init
    git submodule update

_[GIT Clone]_

In your plugin directory type

    git clone git://github.com/josegonzalez/cakephp-gzip.git Gzip

### Enable plugin

In 2.0 you need to enable the plugin your `app/Config/bootstrap.php` file:

		CakePlugin::load('Gzip');

If you are already using `CakePlugin::loadAll();`, then this is not necessary.

## Usage

Include the component in your controller (AppController or otherwise):

```php
<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {
    public $components = array('Gzip.Gzip');
}
?>
```

At this point, everything should theoretically work.

## Notes

Due to the way CakePHP does output buffering, this will only work when debug is less than 2.

## TODO:

- Gzip more than just HTML
- Other, configurable methods of compression
- Turn off compression via a url param or a secret url

## License

Copyright (c) 2010 Jose Diaz-Gonzalez

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
