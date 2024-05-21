import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';
export const __dirname = path.dirname(fileURLToPath(import.meta.url));
const kColorsDir = path.join(__dirname, '..', 'colors');
const kColors = ['shades.json', 'rgb.json', 'base.json'];
const kShades = [
  '50',
  '100',
  '200',
  '300',
  '400',
  '500',
  '600',
  '700',
  '800',
  '900',
  '950',
];
const kColorPrefixes = ['bg', 'text', 'border'];
const kPatternsDir = path.join(__dirname, '..', 'patterns');
const kOutputFile = path.join(kPatternsDir, 'generated.ts');
// const kPatterns = [];
const kPatterns = new Set();
for (const colorFile of kColors) {
  const colorPath = path.join(kColorsDir, colorFile);
  const colorData = JSON.parse(fs.readFileSync(colorPath, 'utf8'));

  //might be list or object
  if (Array.isArray(colorData)) {
    for (const color of colorData) kPatterns.add(color);
  } else {
    for (const color in colorData) kPatterns.add(color);
  }
}
// const kOutputData = JSON.stringify(kPatterns, null, 2);
const kPatternsArray = [...kPatterns];
const kPatternsRegexBase = `(.+?)-((?:${kPatternsArray.join('|')})-[0-9]{3})`;
let outFile = `
import { color as impl } from '../colors';
export default [
    /${kPatternsRegexBase}/,
    (_: string, prefix: string, color: string) => \`$\{prefix}-$\{impl(color)}\`
];`;
console.log(outFile);
fs.writeFileSync(kOutputFile, outFile);

