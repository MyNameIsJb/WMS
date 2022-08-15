import express, { Express, Request, Response } from "express";
import dotenv from "dotenv";
import mongoose from "mongoose";
import cors from "cors";

import userRoutes from "./routes/UserRoutes";

dotenv.config();

const app: Express = express();
const port = process.env.PORT;
const connection = process.env.CONNECTION_URL;

app.use(express.json({ limit: "30mb" }));
app.use(express.urlencoded({ limit: "30mb", extended: true }));
app.use(cors());

app.use("/user", userRoutes);

app.get("/", (req: Request, res: Response) => {
  res.send("Connected successfully");
});

mongoose
  .connect(`${connection}`)
  .then(() =>
    app.listen(port, () => console.log(`Server running on port: ${port}`))
  )
  .catch((error) => console.log(error.message));
