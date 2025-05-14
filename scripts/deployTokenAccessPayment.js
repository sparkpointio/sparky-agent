import hre from "hardhat";
import {PRIVATE_KEY, RPC_URL} from "./arguments/blockchainArgs.js"
import {initialOwner, paymentTokenAddress, initialPrice} from "./arguments/tokenAccessPaymentArgs.js";
// import {ethers} from "ethers";

(async () => {
  try {
    if (!PRIVATE_KEY) {
      throw new Error("Missing environment variable: PRIVATE_KEY");
    }

    // const { ethers } = require("hardhat");

    // const provider = ethers.getDefaultProvider(RPC_URL); // or your local node URL
    // const wallet = new ethers.Wallet(PRIVATE_KEY, provider);
    // const [deployer, address1, address2] = await ethers.getSigners();

    // const initialOwner = wallet.address;

    // =================== Deploy SRK ====================

    const TokenAccessPayment = await hre.ethers.getContractFactory("TokenAccessPayment");
    const tokenAccessPayment = await TokenAccessPayment.deploy(initialOwner, paymentTokenAddress, initialPrice);

    await tokenAccessPayment.waitForDeployment();
    console.log(`TokenAccessPayment deployed to ${tokenAccessPayment.target}`);

    // ===================================================

    // =================== Deploy ERC1967Proxy ===================
    const ERC1967Proxy = await hre.ethers.getContractFactory("contracts/proxy/ERC1967.sol:ERC1967Proxy");
    const erc1967Proxy = await ERC1967Proxy.deploy(tokenAccessPayment.target, "0x");
    await erc1967Proxy.waitForDeployment();
    console.log(`TokenAccessPayment Proxy deployed to ${erc1967Proxy.target}`);
    // ===========================================================


    // =================== Initialize Contracts ===================
    TokenAccessPayment.attach(erc1967Proxy.target);
    console.log(`TokenAccessPayment initialized`);
    // ===========================================================

    // =================== Verify Contracts ====================
    if(process.env.ENV == 'localhost' || process.env.ENV == 'mainnet') {
      await hre.run("verify:verify", {
        address: tokenAccessPayment.target,
        constructorArguments: [
            initialOwner,
            paymentTokenAddress,
            initialPrice
        ],
      });

      await hre.run("verify:verify", {
        address: erc1967Proxy.target,
        constructorArguments: [
          tokenAccessPayment.target,
          "0x"
        ],
        contract: "contracts/proxy/ERC1967.sol:ERC1967Proxy",
        sourcePath: "./contracts/proxy/ERC1967.sol" // Ensure this path is correct
      });
    }
  } catch (e) {
    console.log(e);
  }
})();
