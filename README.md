# Caramel Trading Engine

## Summary
Caramel Trading Engine is a real-time marketplace where you can trade stocks.

<p align="left">
  <img src="Assets/images/project/trading_view_logged_in.PNG" width="800" title="Trading View Logged In"> 
</p>

## Table of Contents  
[Summary](#summary)  
[Features](#features)  
[Contributing](#contributing) 
[Setup database](#setup-database)  
[Live Demo](#live-demo)  
[License](#license)

## Features
- Built-in matching engine.
- Interactive Candlestick Price Graph.
- Interactive Market Depth Graph.
- Create and cancel buy/sell orders.
- Last Trades List.
- My Open Orders List.
- Bids and Asks.
- Account system: Register/Login.
- Admin Dashboard (Work in progress).
- [KYC Verification](https://en.wikipedia.org/wiki/Know_your_customer) (Work in progress).

## Contributing
### Fork this repository
Fork this repository by clicking on the fork button on the top of this page. This will create a copy of this repository in your account.

### Clone your fork
Clone your forked repository to your local machine.

### Create or browse an existing issue
Assign yourself to an existing issue or create a new issue so other contributors know what you are working on.  
Check out our list of [Issues](https://github.com/pablogalve/Caramel-Trading-Engine/issues).

### Create a branch
Create a branch with a descriptive name on your forked repository.

### Make necessary changes and commit those changes
Now it's time to create!

### Submit your changes for review
Create a Pull Request with your changes. I promise that I'll review it as soon as possible to include it in the main repository!

## Setup database
You will need to set up your own database. This time I'm using phpmyadmin.
1. Go to "demo_database_backup/demo_database.sql" and import this .sql file into your phpmyadmin database. This will create all the needed tables + add some demo data.
2. Go to "exchange/demo-database.php" and rename the file from "demo-database.php" to "database.php"
3. Introduce your credentials inside "database.php" (DB_Server, DB_Username, DB_Password, DB_Database)
Congratulations! Your database is setup and running!

## Live Demo
### Instructions
- Visit our [Live Demo](https://www.pablogalve.com/caramel_capital/invest/equity/market-pro).
- Create an account (Register), or use the following credentials (user: test1 | password: test1).
- Visit the 'deposit' section and choose to credit your account with 1000, 10k or 25k EUR. <p align="left"><img src="Assets/images/project/deposit_demo.PNG" width="500" title="Deposit Demo"></p>
- That's all! You can now go to the 'invest' section and start trading!

## License
Check out our [license](license.md).
