export function TOGGLE_SIDEBAR(state) {
  state.sidebar.opened = !state.sidebar.opened;
  state.sidebar.withoutAnimation = false;
  if (state.sidebar.opened) {
    this.$cookies.set("sidebarStatus", true);
  } else {
    this.$cookies.set("sidebarStatus", false);
  }
}

export function SET_SIDEBAR(state, opened) {
  state.sidebar.opened = opened;
}

export function CLOSE_SIDEBAR(state, withoutAnimation) {
  this.$cookies.set("sidebarStatus", false);
  state.sidebar.opened = false;
  state.sidebar.withoutAnimation = withoutAnimation;
}

export function TOGGLE_DEVICE(state, device) {
  state.device = device;
}
