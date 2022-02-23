# CRUD_PHP


<p align="center">
    🎉<b>A Big Thanks To All Our <a href="https://github.com/HDInnovations/UNIT3D-Community-Edition/graphs/contributors">Contributors</a> and <a href="https://github.com/sponsors/HDVinnie">Sponsors</a></b>🎉
</p>

## 📝 Table of Contents

1. [Introduction](#introduction)
2. [Some Features](#features)
3. [Requirements](#requirements)
4. [Installation](#installation)
4.1 [Automated-Installer](#auto-install)
5. [Updating](#updating)
6. [Version Support Information](#versions)
7. [Security](#security)
8. [Contributing](#contributing)
9. [License](#license)
10. [Demo](#demo)
11. [Sponsor-Chat](#chat)
12. [Sponsoring](#sponsor)
13. [Special Thanks](#thanks)


## <a name="introduction"></a> 🧐 Introduction

This is a CRUD in PHP , which aims to simplify connections with all existing database types, creating a standardization of commands. The code is well designed and commented. It uses an intuitive architecture to ensure clarity between logic and presentation. Seeking to ensure a safe and adequate way of storing data. A lightweight and fast shaping engine. Cache system support: "apc", "array", "database", "file", "memcached" and "redis" methods. Eloquent and much more!

## <a name="features"></a> 💎 Some Features

CRUD_PHP currently offers the following features:
  - CRUD system in Mysql with PDO
  - Database + files backup manager
  - and MUCH MORE!

## <a name="requirements"></a> ☑️ Requirements

- A web server with PHP
- PHP 5.0+ is required
- Dependencies for PHP,
- php-curl -> recommended for APIs.
- php-intl -> Recommended for SslCertificate.
- php-zip -> This is required for Backup Manager.
- crontab access
- database server

<pre>
Processor: Anyone 
Frequency: 1.8GHz
RAM: 8GB DDR3
Disks: 20 GB
Bandwidth: 100Mbps
traffic: unlimited
</pre>

## <a name="installation"></a> 🖥️ Installation
To learn more about using CRUD PHP, I recommend looking at our wiki, <a href="https://github.com/maickwendelldev/CRUD_PHP/wiki" target="_blank">click here</a>. 
```

NOTE: If you are running CRUD_PHP on change the following configs.

```

### <a name="auto-install"></a> Automated Installer
**A CRUD_PHP Installer.**

**Supported OS's**
- All (Recommended)

**For Npm:**
```
npm install crud_php 
```

**For Git:**
```
git clone https://github.com/maickwendelldev/CRUD_PHP.git
```

## <a name="updating"></a> 🖥️ Updating
coming soon

## <a name="versions"></a> 🚨 Version Support Information
 Version     | Status                   | PHP Version Required
:------------|:-------------------------|:------------
 0.0.1       |  Active Support :rocket: | >= 5.x.x
 0.0.0       |  End Of Life :skull:     | <= 4.x.x

## <a name="security"></a> 🔐 Security

If you discover any security related issues, please email maickwendelldev@gmail.com instead of using the issue tracker.

## <a name="contributing"></a> ✍️ Contributing

help us build a better crud, send your improvement suggestions to email maickwendelldev@gmail.com.

## <a name="license"></a> 📝 License

CRUD_PHP is open-sourced software licensed under the [MIT License](https://github.com/maickwendelldev/CRUD_PHP/blob/main/LICENSE).

<b> As per license do not remove the license from sourcecode files
```
/**
 * PHP PDO Mysql class.
 * PHP Version 7.0.
 * File Version 1.0.0.0
 *
 * @see       https://github.com/maickwendelldev/CRUD_PHP.git - The CRUD_PHP GitHub project
 *
 * @author    Maick Wendell (Merk/H4ck3r Sl4v3) - (original founder) <maickwendelldev@gmail.com>
 * @copyright 2021 - 2022 Maick Wendell
 * @license   https://github.com/maickwendelldev/CRUD_PHP/blame/main/LICENSE - MIT License
 * @note      This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */
```

 Or the credits from footer in `footer` (optional)
```
<li>
<a href="https://github.com/maickwendelldev/CRUD_PHP.git" target="_blank" class="btn btn-xs btn-primary">CRUD PHP</a>
</li>
```
</b>

## <a name="demo"></a>  🖥️ Demo
For working you need edit in crud.php.(a PDO Mysql is active for to disable just put #)
```
//Put the database server host, by default we put ("localhost");
define("HOST","localhost");
//Put the user who has access to the database server, by default we put ("root");
define("USER","root");
//Put the user password, by default we put empty (""); 
define("PASS","");
//Put the name of the database, which has the access, by default we put "Teste";
define("BASE","Teste");
//Put the charset, by default we put "utf8";
define("CHARSET","utf8");

//Now select the type of database, for that remove the #. (You can only leave one active);
//##################################################################//
//-------------------------- PDO Firebird --------------------------//
#include("1connect/PDO_Firebird.php"); //PDO Firebird;
//-------------------------- PDO Mysql -----------------------------//
include("1connect/PDO_Mysql.php"); //PDO Mysql;
        
```    
For you include in your project exemple.    
```
<!DOCTYPE html>
<?php include("ProjectPath/CRUD_PHP/crud.php"); //You can use (include_once, include, require_once, require) ?>
<html>
<body>

<h1>My First Heading</h1>
<p>My first paragraph.</p>
    
<?php $DBconnect->getList("table", true); //List all in the table ?>
    
</body>
</html>
    
```

## <a name="chat"></a>  💬 Sponsors Can Chat With Us

URL: https://discord.gg/ - coming soon 

## <a name="sponsor"></a> ✨ Sponsor UNIT3D (HDInnovations / HDVinnie)

You can support the work if you're enjoying it, it really keeps you updated to fix issues and add new features. It also helps to pay for the demo server + domain.

Monthy Recurring:

https://github.com/sponsors/maickwendelldev?frequency=recurring&sponsor=maickwendelldev

One-time Custom Amount:

https://github.com/sponsors/maickwendelldev?frequency=one-time&sponsor=maickwendelldev


## <a name="thanks"></a> 🎉 Special Thanks

<a href="https://github.com"><img src="https://i.imgur.com/NVWhzrU.png" height="50px;"></a>
