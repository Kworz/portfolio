import { default as pocketbase } from 'pocketbase';

const pb = new pocketbase(import.meta.env.PB_SERVER_URL);
const articles = await pb.collection("articles").getList(0, 50, { sort: "name" });