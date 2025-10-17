<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renovación de Membresía</title>
    <style>
        body { font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .header { background-color: #0056b3; color: #ffffff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
        .content { padding: 20px; color: #333333; line-height: 1.6; }
        .button { display: inline-block; padding: 10px 20px; margin-top: 20px; background-color: #28a745; color: #ffffff; text-decoration: none; border-radius: 5px; font-weight: bold; }
        .footer { text-align: center; padding: 20px; font-size: 12px; color: #999999; border-top: 1px solid #eeeeee; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>¡No pierdas los beneficios!</h1>
        </div>
        <div class="content">
            <p>Hola {{ $cliente->name }},</p>
            <p>Te escribimos para recordarte que tu membresía vence en 5 días, el <strong>{{ $cliente->end_date->format('d/m/Y') }}</strong>.</p>
            <p>¡No dejes que se agote el tiempo! Renueva tu suscripción ahora para seguir disfrutando de todos nuestros beneficios exclusivos.</p>
            <a href="{{ url('/membership/') }}" class="button">Renovar mi membresía</a>
            <p>Si tienes alguna pregunta, no dudes en contactarnos.</p>
            <p>Gracias por ser parte de nuestra comunidad.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Muestraz. Todos los derechos reservados.</p>
        </div>
    </div>
</body>
</html>