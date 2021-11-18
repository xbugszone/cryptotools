<div id="top"></div>

<p align="center"><a href="https://github.com/xbugszone/cryototools" target="_blank"><img src="https://github.com/xbugszone/cryototools/blob/main/src/resources/cryptocoins.png?raw=true" width="400"></a></p>

<div align="center">

<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->
[![Contributors][contributors-shield]][contributors-url]
[![Forks][forks-shield]][forks-url]
[![Stargazers][stars-shield]][stars-url]
[![Issues][issues-shield]][issues-url]
[![MIT License][license-shield]][license-url]
</div>

<!-- PROJECT LOGO -->
<br />
<div align="center">


<h3 align="center">CryptoTools Framework</h3>

  <p align="center">
    CryptoFramework is a framework intended to easily create bots to manage cryptocurrencies.
    <br /><br/>
    <a href="https://github.com/xbugszone/cryototools"><strong>Explore the docs »</strong></a>
    <br />
    <br />
    <a href="https://github.com/xbugszone/cryototools">View Demo</a>
    ·
    <a href="https://github.com/xbugszone/cryototools/issues">Report Bug</a>
    ·
    <a href="https://github.com/xbugszone/cryototools/issues">Request Feature</a>
  </p>
</div>


<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#roadmap">Roadmap</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#license">License</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#acknowledgments">Acknowledgments</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project

CryptoFramework is a framework intended to easily create bots to manage cryptocurrencies.


<p align="right">(<a href="#top">back to top</a>)</p>



### Built With
* [Laravel](https://laravel.com)


<p align="right">(<a href="#top">back to top</a>)</p>


<!-- GETTING STARTED -->
## Getting Started

To get started you can use as base a framework like laravel or symfony but for this example I will use it in a blank project 

### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* composer blank project
  ```sh
  composer init
  ```

### Installation
1. install package in the blank project folder
```sh
composer require xbugszone/cryptotools
```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- USAGE EXAMPLES -->
## Usage

1. Create a folder called Brokers in your project and with a file inside, for this example we will use the Bitstamp exchange so lets call this file MyBitstamp.php
   In this file should be this code
```php
namespace App\Brokers;

use ccxt\bitstamp;
use Xbugszone\Cryptotools\Brokers\CCTXBroker;

class MyBitstamp extends CCTXBroker
{
protected string $exchange = bitstamp::class;
protected string $apiKey = "your api key";
protected string $apiSecret = "your api secret";
}

   ```
2. Get the API Key from the selected exchange and update on the file

3. Now to run this app we create a file inside our project but outside of the Brokers folder and we can call it run.php with the following code:
```php
<?php

namespace App\Console\Commands;

use App\Brokers\MyBitstamp;
$broker = new MyBitstamp();
print_r($broker->getBalance());

   ```

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ROADMAP -->
## Roadmap

- [] Brokers automatic stubs
- [] Signals
- [] Strategies
    - [] Bot squeleton stubs
    
<p align="right">(<a href="#top">back to top</a>)</p>




<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to learn, inspire, and create. Any contributions you make are **greatly appreciated**.

If you have a suggestion that would make this better, please fork the repo and create a pull request. You can also simply open an issue with the tag "enhancement".
Don't forget to give the project a star! Thanks again!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE.txt` for more information.

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- CONTACT -->
## Contact

Tiago Andre <xbugszone@gmail.com>

[https://github.com/xbugszone/cryototools](https://github.com/xbugszone/cryototools)

<p align="right">(<a href="#top">back to top</a>)</p>



<!-- ACKNOWLEDGMENTS -->
## Acknowledgments

* [Best-README-Template](https://github.com/othneildrew/Best-README-Template)
* [ccxt/ccxt](https://github.com/ccxt/ccxt)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/xbugszone/cryototools.svg?style=for-the-badge
[contributors-url]: https://github.com/xbugszone/cryototools/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/xbugszone/cryototools.svg?style=for-the-badge
[forks-url]: https://github.com/xbugszone/cryototools/network/members
[stars-shield]: https://img.shields.io/github/stars/xbugszone/cryototools?style=for-the-badge
[stars-url]: https://github.com/xbugszone/cryototools/stargazers
[issues-shield]: https://img.shields.io/github/issues/xbugszone/cryototools.svg?style=for-the-badge
[issues-url]: https://github.com/xbugszone/cryototools/issues
[license-shield]: https://img.shields.io/github/license/xbugszone/cryototools.svg?style=for-the-badge
[license-url]: https://github.com/xbugszone/cryototools/blob/master/LICENSE.txt
