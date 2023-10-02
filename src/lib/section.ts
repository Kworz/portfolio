import { writable } from "svelte/store";

export const section = writable<"home" | "experience" | undefined>(undefined);