const nodemailer = require('nodemailer');

exports.handler = async (event) => {
  const { phone } = JSON.parse(event.body);

  // Create a transporter using Yandex SMTP credentials
  const transporter = nodemailer.createTransport({
    host: 'smtp.yandex.com',
    port: 465,
    secure: true,
    auth: {
      user: 'servicecoffee.5upport@yandex.ru',
      pass: 'Anton7391824',
    },
  });

  // Define the email options
  const mailOptions = {
    from: 'servicecoffee.5upport@yandex.ru',
    to: 'antoniestories@gmail.com',
    subject: 'Новая заявка с ServiceCoffee', 
    text: `Дата: ${new Date().toLocaleString()}\nНомер телефона: ${phone}`,
  };

  try {
    // Send the email
    await transporter.sendMail(mailOptions);
    return {
      statusCode: 200,
      body: JSON.stringify({ message: 'Email sent successfully' }),
    };
  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ message: 'Failed to send email' }),
    };
  }
};
