php-youtube-dl
==============
A simple php wrapper for youtube-dl.

**This guide assumes you have youtube-dl installed.**

Installation
----------- 
You can install this library with composer or include it manually in your project.

Quick start
-----------

```php
$ytDownload = new Youtube();
```
or with custom path to the youtube-dl executable
```php
$ytDownload = new Youtube('<PATH_TO_YOUTUBE_DL>');
```

After this you can run one of two commands, info or download. If one of the commmands failed youtube-dl will throw an Exception.

```php
$info = $ytDownload->info('https://www.youtube.com/watch?v=eNdZ3vK392k');
 
$info = $ytDownload->download('https://www.youtube.com/watch?v=eNdZ3vK392k', array(
    '--no-progress',
    '--audio-format mp3',
));
```

##Available Options

For all available parameters take a look at the youtube-dl doc.