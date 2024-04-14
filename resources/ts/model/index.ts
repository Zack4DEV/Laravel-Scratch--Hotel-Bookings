
export function fakeNickName(options: Recordable) {
  const { type } = options;

  if (type === 'mobile') {
    return `User${options.mobile.slice(-4)}`;
  }

  return `user${String(new Date().getMonth() + 1).padStart(2, '0')}-${String(new Date().getDate()).padStart(2, '0')}`;
}
