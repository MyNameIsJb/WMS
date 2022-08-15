import { Request, Response, NextFunction } from "express";
import jwt from "jsonwebtoken";

const auth = async (req: Request, res: Response, next: NextFunction) => {
  const auth = req.headers.authorization;
  if (auth && auth.startsWith("Bearer")) {
    const token = auth.slice(7);

    try {
      const tokenData = jwt.verify(token, "ezA0CbFjEDdbugKYSbL2StVZIukUa5fv");
      req.body.tokenData = tokenData;
      next();
    } catch (error) {
      res.status(401).json({ message: "Unauthorized" });
    }
  }
};

export default auth;
