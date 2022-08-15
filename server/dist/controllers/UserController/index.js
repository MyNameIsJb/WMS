"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.profile = exports.signup = exports.refreshToken = exports.signin = void 0;
const bcryptjs_1 = __importDefault(require("bcryptjs"));
const jsonwebtoken_1 = __importDefault(require("jsonwebtoken"));
const UserModel_1 = __importDefault(require("../../models/UserModel"));
const signin = (req, res) => __awaiter(void 0, void 0, void 0, function* () {
    const { email, password } = req.body;
    try {
        const existingUser = yield UserModel_1.default.findOne({ email });
        if (!existingUser)
            return res.status(404).json({ message: "User doesn't exist." });
        const isPasswordCorrect = yield bcryptjs_1.default.compare(password, existingUser.password);
        if (!isPasswordCorrect)
            return res.status(400).json({ message: "Invalid credentials" });
        const accessToken = jsonwebtoken_1.default.sign({ email: existingUser.email, id: existingUser._id }, "ezA0CbFjEDdbugKYSbL2StVZIukUa5fv", { expiresIn: "4h" });
        const refreshToken = jsonwebtoken_1.default.sign({ email: existingUser.email, id: existingUser._id }, "P4iMNfautEQsadd9gG3KsInAonXAf9yu", {
            expiresIn: "12h",
        });
        res
            .status(200)
            .json({ accessToken, refreshToken, message: "Successfully logged in" });
    }
    catch (error) {
        res.status(500).json({ message: "Something went wrong." });
    }
});
exports.signin = signin;
const refreshToken = (req, res) => __awaiter(void 0, void 0, void 0, function* () {
    const refreshToken = req.headers.authorization;
    if (refreshToken && refreshToken.startsWith("Bearer")) {
        const filteredRefreshToken = refreshToken.slice(7);
        try {
            const refreshTokenData = jsonwebtoken_1.default.verify(filteredRefreshToken, "P4iMNfautEQsadd9gG3KsInAonXAf9yu");
            req.body.tokenData = refreshTokenData;
            const { email, id } = req.body.tokenData;
            const accessToken = jsonwebtoken_1.default.sign({ email, id }, "ezA0CbFjEDdbugKYSbL2StVZIukUa5fv", {
                expiresIn: "4h",
            });
            res.status(200).json({ accessToken });
        }
        catch (error) {
            res.status(401).json({ message: "Token not found" });
        }
    }
});
exports.refreshToken = refreshToken;
const signup = (req, res) => __awaiter(void 0, void 0, void 0, function* () {
    const { username, password, firstName, lastName, address, birthDate, contactNumber, email, levelOfAccess, store, avatar, } = req.body;
    try {
        const existingUsername = yield UserModel_1.default.findOne({ username });
        const existingContactNumber = yield UserModel_1.default.findOne({ contactNumber });
        const existingEmail = yield UserModel_1.default.findOne({ email });
        const existingStore = yield UserModel_1.default.findOne({ store });
        if (existingUsername)
            return res.status(400).json({ message: "Username already exist" });
        if (existingContactNumber)
            return res.status(400).json({ message: "Contact number already exist" });
        if (existingEmail)
            return res.status(400).json({ message: "Email already exist" });
        if (existingStore)
            return res.status(400).json({ message: "Email already exist" });
        const hashedPassword = yield bcryptjs_1.default.hash(password, 12);
        const result = yield UserModel_1.default.create({
            username,
            password: hashedPassword,
            name: `${firstName} ${lastName}`,
            address,
            birthDate,
            contactNumber,
            email,
            levelOfAccess,
            store,
            avatar,
        });
        res
            .status(200)
            .json({ message: "Successfully registered", result: result });
    }
    catch (error) {
        res.status(500).json({ message: "Something went wrong." });
    }
});
exports.signup = signup;
const profile = (req, res) => __awaiter(void 0, void 0, void 0, function* () {
    const { email } = req.body.tokenData;
    try {
        const profile = yield UserModel_1.default.findOne({ email });
        res.status(200).json(profile);
    }
    catch (error) {
        res.status(500).json({ message: "Something went wrong." });
    }
});
exports.profile = profile;
