# Simple PHP Catcher

## Description

Simple PHP catcher, to store the elements of an HTTP request in a text file.

## Usage

### Catch everything on each request

```php
require_once("SimplePHPCatcher.class.php");
$catcher = new SimpleCatcher("catch.txt", "https://www.example.com/");
$catcher->redirectOnCookie(); // Redirect if the 'rememberme' cookie is set

$catcher->catch(true); // catch data and headers (true parameter) 
$catcher->setRememberCookie(); // set the rememberme cookie to redirect the user on new visit (optional)
$catcher->redirect(); // Redirect the user on the URL set in the constructor (optional)

```

### Catch only POST data

```php
require_once("SimplePHPCatcher.class.php");
$catcher = new SimpleCatcher("catch.txt", "https://www.example.com/");
$catcher->redirectOnCookie(); // Redirect if the 'rememberme' cookie is set

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $catcher->catch(); // catch the data without headers
    $catcher->setRememberCookie(); // set the rememberme cookie to redirect the user on new visit (optional)
    $catcher->redirect(); // Redirect the user on the URL set in the constructor (optional)
}
```

### Catch only GET data

```php
require_once("SimplePHPCatcher.class.php");
$catcher = new SimpleCatcher("catch.txt", "https://www.example.com/");
$catcher->redirectOnCookie(); // Redirect if the 'rememberme' cookie is set

if ($_SERVER['REQUEST_METHOD'] === "GET") {
    $catcher->catch(); // catch the data in the file set in the constructor
    $catcher->setRememberCookie(); // set the rememberme cookie to redirect the user on new visit (optional)
    $catcher->redirect(); // Redirect the user on the URL set in the constructor (optional)
}
```

### Catch POST JSON data without redirection management

```php
require_once("SimplePHPCatcher.class.php");
$catcher = new SimplePHPCatcher("catch.txt");
$catcher->cors();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $catcher->catch();
}
```

## Example

See the `example.php` and `example_ajax.php` files.

Output examples:

```
2021-03-04 15:13:47 +0100

Host: 192.168.1.124
Upgrade-Insecure-Requests: 1
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,fr;q=0.8
Connection: close
Content-Type: application/json
Content-Length: 31

(object) array(
   'test2' => 'test',
   'test3' => 'test',
)
```

```
2021-03-04 15:15:40 +0100

Host: 192.168.1.124
Content-Length: 31
Cache-Control: max-age=0
Upgrade-Insecure-Requests: 1
Origin: http://192.168.1.124
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.190 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9
Referer: http://192.168.1.124/example.php
Accept-Encoding: gzip, deflate
Accept-Language: en-US,en;q=0.9,fr;q=0.8
Connection: close

login: login
password: p@ssword
```

## License

Author:	Romain Garcia

Copyright 2021, Romain Garcia

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this file except in compliance with the License. You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.