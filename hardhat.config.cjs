require("@nomicfoundation/hardhat-toolbox");
require("dotenv").config();

const RPC_URL = process.env.RPC_URL || "";
const PRIVATE_KEY = process.env.PRIVATE_KEY || "";
const API_KEY = process.env.API_EXPLORER_KEY || "";
const CHAIN_ID = Number(process.env.CHAIN_ID);
const API_URL = process.env.API_EXPLORER_URL || "";
const EXPLORER_URL = process.env.EXPLORER_URL || "";

module.exports = {
    defaultNetwork: "localhost",
    solidity: {
        compilers: [
            {
                version: "0.8.7",
                settings: {
                    viaIR: true,
                    optimizer: { enabled: true, runs: 200 },
                },
            },
            {
                version: "0.8.22",
                settings: {
                    viaIR: true,
                    optimizer: { enabled: true, runs: 200 },
                },
            },
        ],
    },
    networks: {
        local: {
            url: RPC_URL,
            accounts: [PRIVATE_KEY],
        },
    },
    etherscan: {
        apiKey: { local: API_KEY },
        customChains: [
            {
                network: "local",
                chainId: CHAIN_ID,
                urls: {
                    apiURL: API_URL,
                    browserURL: EXPLORER_URL,
                },
            },
        ],
    },
};
