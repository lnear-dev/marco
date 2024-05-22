import { test, expect } from 'vitest';
import { generateCSS as impl } from '../index.js';
import { replace } from './index.js';
// import expectations from './expect.json';
import expectations from '../../php/Data/patterns/expect.json';
import { PrefixMap } from '../modifiers/PrefixMap.js';
import { CSSBreakpointOptionsImplementer } from '../CSSBreakpointOptionsImplementer.js';
const css = (strings: TemplateStringsArray) =>
  strings.join('').replace(/\s+/g, '');
const generateCSS = (opt: CSSBreakpointOptionsImplementer) => impl(opt).replace(/\s+/g, '');
test('marco-replace-all', () => {
  const src = (() => {
    const keys = Object.keys(expectations);
    const shuffled = {} as Record<string, string>;
    for (const _ of keys) {
      const randomIndex = Math.floor(Math.random() * keys.length);
      shuffled[keys[randomIndex]] =
        expectations[keys[randomIndex] as keyof typeof expectations];
    }
    return shuffled;
  })();
  expect(replace(...Object.keys(src))).toBe(Object.values(src).join(''));
});

test.each(Object.entries(expectations))('it should replace %s with %s',
  (key, value) => {
    expect(replace(key)).toBe(value);
  })

test('it can split strings', () => {
  const toSplit: string[] = [
    'hello',
    'sm:world',
    'hover:whoo',
    'hover:whooo',
    'foo:bar',
    'baz:qux',
    'sm:hover:smhover',
    'foo:baz:foobaz',
  ];
  const toSplitExpectation = {
    __root__: ['hello'],
    sm: ['world', 'smhover'],
    hover: ['whoo', 'whooo', 'smhover'],
    foo: ['bar', 'foobaz'],
    baz: ['qux', 'foobaz'],
  };
  const toSplitExpectationJson = JSON.stringify(toSplitExpectation);
  const map = new PrefixMap(toSplit);
  expect(map.toJSONString()).toBe(toSplitExpectationJson);
  expect(map.toObject()).toStrictEqual(toSplitExpectation);
});

test('generateCSS - default options', () => {
  const opt = new CSSBreakpointOptionsImplementer({
    stylesheet: css`
      div {
        width: 100%;
      }
    `,
    md: css`
      div {
        width: 75%;
      }
    `,
    lg: css`
      div {
        width: 50%;
      }
    `,
  });
  expect(generateCSS(opt)).toBe(
    // prettier-ignore
    // css`div{width:100%}@media (width>=768px){div{width:75%}}@media (width>=1024px){div{width:50%}}`
    css` div { width: 100%; } @media(min-width: 768px){  div { width: 75%; }  }@media(min-width: 1024px){  div { width: 50%; }  } `
  );
});

test('generateCSS - custom options', () => {
  const opt = new CSSBreakpointOptionsImplementer({
    stylesheet: css`
      div {
        width: 80%;
      }
    `,
    sm: css`
      div {
        width: 60%;
      }
    `,
    lg: css`
      div {
        width: 40%;
      }
    `,
    dark: css`
      div {
        background-color: black;
      }
    `,
    screens: {
      'sm': { min: '600px' },
      'md': { min: '800px' },
      'lg': { min: '1000px' },
      'xl': { min: '1200px' },
      'xl2': { min: '1400px' },
      'dark': { prefersColorScheme: 'dark' },
      'light': { prefersColorScheme: 'light' },
    },
    macros: 'sr-only',
  });
  expect(generateCSS(opt)).toBe(
    // prettier-ignore
    css`:host{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0;}div{width:80%;}@media(min-width:600px){div{width:60%;}}@media(min-width:1000px){div{width:40%;}}@media(prefers-color-scheme:dark){div{background-color:black;}}`
  );
  expect(opt.screenSizeAt('sm')).toBe('600px');
  expect(opt.screenSizeAt('sm', 'min')).toBe('600px');
  expect(opt.screenSizeAt('sm', 'max')).toBe('');

  expect(opt.screenSizeAt('md')).toBe('800px');
  expect(opt.screenSizeAt('md', 'min')).toBe('800px');
  expect(opt.screenSizeAt('md', 'max')).toBe('');
});


test('generateCSS - macros', () => {
  const _opt = new CSSBreakpointOptionsImplementer({
    stylesheet: css`
    div {
      width: 80%;
    }
  `,
    sm: css`
    div {
      width: 60%;
    }
  `,
    lg: css`
    div {
      width: 40%;
    }
  `,
    dark: css`
    div {
      background-color: black;
    }
  `,
  });


  expect(generateCSS(new CSSBreakpointOptionsImplementer({
    ..._opt,
    macros: 'sr-only sm:not-sr-only',
  }))).toBe(
    // prettier-ignore
    css`:host{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border-width:0;@media(min-width:640px){position:static;width:auto;height:auto;padding:0;margin:0;overflow:visible;clip:auto;white-space:normal;}}div{width:80%;}@media(min-width:640px){div{width:60%;}}@media(min-width:1024px){div{width:40%;}}@media(prefers-color-scheme:dark){div{background-color:black;}}`
  );
  expect(generateCSS(new CSSBreakpointOptionsImplementer({
    ..._opt,
    macros: '*:not-sr-only',
  }))).toBe(
    // prettier-ignore
    css`:host{&>*{position:static;width:auto;height:auto;padding:0;margin:0;overflow:visible;clip:auto;white-space:normal;}}div{width:80%;}@media(min-width:640px){div{width:60%;}}@media(min-width:1024px){div{width:40%;}}@media(prefers-color-scheme:dark){div{background-color:black;}}`
  );
  expect(generateCSS(new CSSBreakpointOptionsImplementer({
    ..._opt,
    macros: '*:col-auto',
  }))).toBe(
    // prettier-ignore
    css`:host{&>*{grid-column:auto;}}div{width:80%;}@media(min-width:640px){div{width:60%;}}@media(min-width:1024px){div{width:40%;}}@media(prefers-color-scheme:dark){div{background-color:black;}}`
  );

});

