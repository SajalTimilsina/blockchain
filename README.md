Introduction

Welcome to the Basic Blockchain Function project in Python! This project aims to demonstrate the fundamental concepts of blockchain by implementing a simplified version of a blockchain system. The program is divided into three main components: Miner Node, User Node, and Blockchain Node.

Project Overview

The project is inspired by the concepts found in Bitcoin and Ethereum but is simplified for educational purposes. It allows users to create transactions, miners to verify and approve transactions, and the blockchain to store and manage the chain of validated transactions.

The three main components are:

1) Miner Node: Responsible for mining new blocks and validating pending transactions. Miners play a crucial role in securing the network by solving computational puzzles (proof-of-work) to add new blocks to the blockchain.

2) User Node: Represents the users or participants who can create transactions by sending/receiving tokens. Users can interact with the blockchain by submitting their transactions to be included in the next block.

3) Blockchain Node: The heart of the system, this component manages the entire blockchain. It stores the complete chain of blocks, approves and validates transactions, and allows new nodes to join the network.

Installation

Follow the steps below to set up the project on your local machine:

1) Clone the repository to your local machine using the following command:
    git clone https://github.com/SajalTimilsina/blockchain.git
2) Navigate to the project directory:

   cd blockchain-python
4) Create a virtual Environment (optional, but recommended)

    python -m venv venv

6) Activate the virtual environment

   On Windows:
       venv\Scripts\activate

    On MacOS and Linux:
    source venv/bin/activate

8) Install the required dependencies:

   pip install -r requirement.txt
   

Features:

The basic blockchain function project offers the following features:

Transaction Approval: 

Transactions are verified and approved by miner nodes through a proof-of-work mechanism, ensuring the integrity of the blockchain.

Chain Storage: 

The blockchain node stores the entire chain of validated blocks, enabling transparent and secure transaction history.

Join the Chain: 

New nodes can join the blockchain network, enhancing the decentralized nature of the system.

References

This project is created with reference to the concepts found in the Bitcoin and Ethereum whitepapers:

Bitcoin Whitepaper
Ethereum Whitepaper

Note: This project is intended for educational purposes only and should not be used for production-level implementations.

Feel free to contribute to this project and explore the fascinating world of blockchain!

Happy coding! 🚀
