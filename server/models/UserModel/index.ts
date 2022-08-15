import { Schema, model } from "mongoose";

interface UserTypes {
  username: string;
  password: string;
  name: string;
  address: string;
  birthDate: string;
  contactNumber: string;
  email: string;
  levelOfAccess: string;
  store?: string;
  id?: string;
  avatar?: string;
}

const userSchema = new Schema<UserTypes>({
  username: {
    type: String,
    required: true,
  },
  password: {
    type: String,
    required: true,
  },
  name: {
    type: String,
    required: true,
  },
  address: {
    type: String,
    required: true,
  },
  birthDate: {
    type: String,
    required: true,
  },
  contactNumber: {
    type: String,
    required: true,
  },
  email: {
    type: String,
    required: true,
  },
  levelOfAccess: {
    type: String,
    required: true,
  },
  store: {
    type: String,
  },
  id: {
    type: String,
  },
  avatar: {
    type: String,
  },
});

const User = model<UserTypes>("User", userSchema);

export default User;
