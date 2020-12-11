import auth from "~/middleware/admin/auth";

import authRepository from "./admin/auth";
import userRepository from "./admin/user";

export default axios => ({
  admin: {
    auth: authRepository(axios),
    user: userRepository(axios)
  }
})
