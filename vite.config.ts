// @ts-check
import { resolve } from "path";
import { defineConfig } from "vite";
import dts from "vite-plugin-dts";
export default defineConfig({
  build: {
    lib: {
      entry: resolve(__dirname, "js/index.ts"),
      name: "Lnear Marco",
      fileName: "lnear-marco",
      formats: ["es"],
    },
  },
  resolve: { alias: { src: resolve('js/') } },
  plugins: [dts({ rollupTypes: true })],
});
