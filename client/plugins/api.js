
import repository from "@/api/repository";

export default (ctx, inject) => {
  inject('api', repository(ctx.$axios));
}
