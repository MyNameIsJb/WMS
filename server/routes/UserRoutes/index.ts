import express from "express";

import {
  signin,
  refreshToken,
  signup,
  profile,
} from "../../controllers/UserController";
import auth from "../../middleware/auth";

const router = express.Router();

router.post("/signin", signin);
router.post("/token", refreshToken);
router.post("/signup", signup);

router.get("/profile", auth, profile);

export default router;
