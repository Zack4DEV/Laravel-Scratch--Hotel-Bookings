import { nextTick, onMounted, onActivated } from 'vue';

/**
* Register a callback function to be executed after the component `onMounted` or `onActivated` (will only be executed once)
* @description can be used for `<KeepAlive>` cached components
*/
export function onMountedOrActivated(callback: () => void): void {
  let mounted: boolean;

  onMounted(() => {
    callback();
    nextTick(() => {
      mounted = true;
    });
  });

  onActivated(() => {
    if (mounted) {
      callback();
    }
  });
}
