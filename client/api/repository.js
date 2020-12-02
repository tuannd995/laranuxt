import auth from "~/middleware/admin/auth";

import authRepository from "./auth";

export default axios => ({
  auth: authRepository(axios)
})
