<a id="readme-top"></a>

<div align="center">

![Laravel](https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/100px-Laravel.svg.png)

</div>

<h1 align="center">Larapark</h1>

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-323330?style=for-the-badge&logo=javascript&logoColor=F7DF1E)
![Vite](https://img.shields.io/badge/Vite-B73BFE?style=for-the-badge&logo=vite&logoColor=FFD62E)

Manage your parking lot in the most efficient way, totally free!

</div>

![Vehicles](https://i.ibb.co/mTXjdbh/M-dulo-Veh-culos.png)


## Table of Contents

  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#screenshots">Screenshots</a></li>
    <li><a href="#license">License</a></li>
  </ol>


## About The Project

Larapark is a web-based parking management system designed to streamline the administration of parking lots and spaces. Built with Laravel, this free application provides a user-friendly interface and essential features for efficient parking management.

Key functionalities include vehicle registration, tracking of active vehicles, billing calculations, and comprehensive tariff management. Users can easily monitor total revenue, manage vehicle records, and customize parking rates. With dark mode compatibility and a robust authentication system, Larapark ensures a secure and visually appealing experience for parking lot operators. This project aims to enhance operational efficiency and improve the overall management of parking facilities. 

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>


## Getting Started

### Prerequisites

- **Laravel 10**
- **Composer**

### Installation

1. Clone this repo to your computer:
   ```sh
   git clone git@github.com:MarcosKlender/Larapark.git
   ```
2. Update (if needed) and install dependencies with:
   ```sh
   cd Larapark
   composer update
   composer install
   ```
3. Use this to create your own `.env` file:
   ```sh
   cp .env.example .env
   ```
4. Update the `.env` file with your database credentials and run:
   ```sh
   php artisan migrate --seed
   php artisan key:generate
   ```
5. Launch the local server and start using the app:
   ```sh
   php artisan serve
   ```
6. Use the default credentials (don't forget to change it):
   ```sh
   Email: admin@larapark.com
   Password: admin123
   ```

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>


## Screenshots

![Login](https://i.ibb.co/hgF03gq/Login.png)

![Dashboard](https://i.ibb.co/L8893NV/Escritorio-Oscuro.png)

![History](https://i.ibb.co/b1w64mT/M-dulo-Historial.png)

![Tariff](https://i.ibb.co/Zxdmq7F/M-dulo-Tarifas.png)

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>


## License

Distributed under the MIT License. This app doesn't collect any information at all.

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>
