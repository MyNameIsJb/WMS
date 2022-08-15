"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const UserController_1 = require("../../controllers/UserController");
const auth_1 = __importDefault(require("../../middleware/auth"));
const router = express_1.default.Router();
router.post("/signin", UserController_1.signin);
router.post("/token", UserController_1.refreshToken);
router.post("/signup", UserController_1.signup);
router.get("/profile", auth_1.default, UserController_1.profile);
exports.default = router;
