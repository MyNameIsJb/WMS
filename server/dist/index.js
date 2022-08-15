"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const dotenv_1 = __importDefault(require("dotenv"));
const mongoose_1 = __importDefault(require("mongoose"));
const cors_1 = __importDefault(require("cors"));
const UserRoutes_1 = __importDefault(require("./routes/UserRoutes"));
dotenv_1.default.config();
const app = (0, express_1.default)();
const port = process.env.PORT;
const connection = process.env.CONNECTION_URL;
app.use(express_1.default.json({ limit: "30mb" }));
app.use(express_1.default.urlencoded({ limit: "30mb", extended: true }));
app.use((0, cors_1.default)());
app.use("/user", UserRoutes_1.default);
app.get("/", (req, res) => {
    res.send("Connected successfully");
});
mongoose_1.default
    .connect(`${connection}`)
    .then(() => app.listen(port, () => console.log(`Server running on port: ${port}`)))
    .catch((error) => console.log(error.message));
