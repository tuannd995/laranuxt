import auth from "~/middleware/admin/auth";

import authRepository from "./admin/auth";

export default axios => ({
  admin: {
    auth: authRepository(axios)
  }
})
