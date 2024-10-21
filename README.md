# E-voting Blockchain

E-voting Blockchain is a decentralized voting application built on blockchain technology. This project aims to provide a secure, transparent, and tamper-proof platform for conducting elections. Leveraging blockchain ensures that votes are immutable and verifiable, making the system resistant to fraud and manipulation.

## Key Features
- **Blockchain-based Voting**: Ensures votes are stored on a decentralized ledger for transparency.
- **Security**: Each vote is encrypted, ensuring confidentiality and integrity.
- **Transparency**: The blockchain ledger is accessible and verifiable by all participants, preventing vote tampering.
- **Anonymity**: Ensures the voter's identity is kept confidential.

## Prerequisites

Before running this project, ensure you have the following installed:

- [Node.js](https://nodejs.org/) v14.x or later
- [Laravel](https://laravel.com/) Framework v8.x
- [Composer](https://getcomposer.org/) v2.x or later
- [MySQL](https://www.mysql.com/) Database

## Installation

Follow these steps to set up and run the project locally:

1. **Clone the repository:**
   git clone https://github.com/MekdadGhazal/E-voting-Blockchain.git
   cd E-voting-Blockchain

2. **Install dependencies:**
2.1Backend (Laravel) Dependencies:
composer install

2.2Frontend (Node.js) Dependencies:

npm install


3. ** Set up Environment Variables: ** Copy the ".env.example" file to ".env":
cp .env.example .env

Then update the .env file with your database credentials and other configurations:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password


4. **Generate application key:**
php artisan key:generate

5. **Run database migrations:**

php artisan migrate

6. **Serve the Application: Run the Laravel server:**
php artisan serve

The application will be available at: http://localhost:8000


Running the Blockchain Network
Set up the blockchain network: Make sure the blockchain node is running, and that the necessary blockchain smart contracts are deployed.

Interact with the blockchain:

Use the front end to cast votes.
Each vote is recorded in the blockchain ledger.
Monitor blockchain transactions: You can view blockchain transactions using tools like Ganache or MetaMask to ensure the integrity of the voting process.


Usage
Casting a Vote: Users can log in and securely cast their votes.
Blockchain Ledger: Votes are written to the blockchain, ensuring they cannot be altered or deleted.
Election Results: Results are available after the voting period ends and can be publicly verified on the blockchain.
Contributing
If you would like to contribute to the project, please fork the repository and submit a pull request. Make sure to follow the coding guidelines and write relevant tests for your changes.

License:
### Additional Customizations
If there are specific blockchain platforms (e.g., Ethereum, Hyperledger) or frameworks used for the smart contracts, we can add those details.

You can replace placeholder sections like `your_database`, `your_username`, etc., with the actual project details.