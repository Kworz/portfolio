import { PrismaClient } from '@prisma/client';

const prisma = new PrismaClient();

const articles = await prisma.article.findMany();

console.log(articles);