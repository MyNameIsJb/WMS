import { Request, Response } from "express";
import bcrypt from "bcryptjs";
import jwt from "jsonwebtoken";

import User from "../../models/UserModel";

export const signin = async (req: Request, res: Response) => {
  const { email, password } = req.body;

  try {
    const existingUser = await User.findOne({ email });

    if (!existingUser)
      return res.status(404).json({ message: "User doesn't exist." });

    const isPasswordCorrect = await bcrypt.compare(
      password,
      existingUser.password
    );

    if (!isPasswordCorrect)
      return res.status(400).json({ message: "Invalid credentials" });

    const accessToken = jwt.sign(
      { email: existingUser.email, id: existingUser._id },
      "ezA0CbFjEDdbugKYSbL2StVZIukUa5fv",
      { expiresIn: "4h" }
    );

    const refreshToken = jwt.sign(
      { email: existingUser.email, id: existingUser._id },
      "P4iMNfautEQsadd9gG3KsInAonXAf9yu",
      {
        expiresIn: "12h",
      }
    );

    res
      .status(200)
      .json({ accessToken, refreshToken, message: "Successfully logged in" });
  } catch (error) {
    res.status(500).json({ message: "Something went wrong." });
  }
};

export const refreshToken = async (req: Request, res: Response) => {
  const refreshToken = req.headers.authorization;
  if (refreshToken && refreshToken.startsWith("Bearer")) {
    const filteredRefreshToken = refreshToken.slice(7);
    try {
      const refreshTokenData = jwt.verify(
        filteredRefreshToken,
        "P4iMNfautEQsadd9gG3KsInAonXAf9yu"
      );
      req.body.tokenData = refreshTokenData;

      const { email, id } = req.body.tokenData;
      const accessToken = jwt.sign(
        { email, id },
        "ezA0CbFjEDdbugKYSbL2StVZIukUa5fv",
        {
          expiresIn: "4h",
        }
      );

      res.status(200).json({ accessToken });
    } catch (error) {
      res.status(401).json({ message: "Token not found" });
    }
  }
};

export const signup = async (req: Request, res: Response) => {
  const {
    username,
    password,
    firstName,
    lastName,
    address,
    birthDate,
    contactNumber,
    email,
    levelOfAccess,
    store,
    avatar,
  } = req.body;

  try {
    const existingUsername = await User.findOne({ username });
    const existingContactNumber = await User.findOne({ contactNumber });
    const existingEmail = await User.findOne({ email });
    const existingStore = await User.findOne({ store });

    if (existingUsername)
      return res.status(400).json({ message: "Username already exist" });

    if (existingContactNumber)
      return res.status(400).json({ message: "Contact number already exist" });

    if (existingEmail)
      return res.status(400).json({ message: "Email already exist" });

    if (existingStore)
      return res.status(400).json({ message: "Email already exist" });

    const hashedPassword = await bcrypt.hash(password, 12);

    const result = await User.create({
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
  } catch (error) {
    res.status(500).json({ message: "Something went wrong." });
  }
};

export const profile = async (req: Request, res: Response) => {
  const { email } = req.body.tokenData;
  try {
    const profile = await User.findOne({ email });
    res.status(200).json(profile);
  } catch (error) {
    res.status(500).json({ message: "Something went wrong." });
  }
};
