import { writable } from "svelte/store";

export const section = writable<"home" | "experience" | "projects" | "contact" | undefined>(undefined);