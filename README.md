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
Want to report a bug, request a feature, contribute or translate Caramel Trading Engine?

- Browse our issues, comment on proposals, report bugs.
- Clone the caramel trading engine repo, make some changes and issue a pull-request with your changes.
- Anything you want to tell us please send it to pablogalve100@gmail.com
- If you need technical support or customization service, contact: pablogalve100@gmail.com

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
Check out our [license](LICENSE.md).
