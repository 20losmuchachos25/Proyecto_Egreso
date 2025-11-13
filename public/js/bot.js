import express from "express";
import bodyParser from "body-parser";
import axios from "axios";

const app = express();
app.use(bodyParser.json());

// 👇 Reemplazá esto con tu token real del bot
const TOKEN = "8209165920:AAF87kc_yvCx4Yo0zLBjNDYixv2BBrRxyZQ";
const TELEGRAM_API = `https://api.telegram.org/bot${TOKEN}`;

// 📩 Telegram enviará aquí los mensajes del usuario
app.post("/webhook", async (req, res) => {
  const message = req.body.message;

  if (message && message.text) {
    const chatId = message.chat.id;
    const text = message.text;

    console.log(`📨 Mensaje recibido: ${text}`);

    // Ejemplo: responder automáticamente
    await axios.post(`${TELEGRAM_API}/sendMessage`, {
      chat_id: chatId,
      text: `Hola ${message.from.first_name || ""}, recibí tu mensaje: "${text}" 😄`,
    });
  }

  res.sendStatus(200);
});

// 🚀 Iniciar el servidor
app.listen(8000, () => {
  console.log("🤖 Bot de Telegram escuchando en http://localhost:8000");
});

