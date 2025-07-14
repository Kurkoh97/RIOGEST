        let currentUser = {
            name: "Duvan Henao",
            email: "duvanhenao19@gmail.com",
            avatar: "DH",
            notifications: 5
        };

        let posts = [
            {
                id: 1,
                author: "María Camila Rodríguez",
                avatar: "MC",
                type: "QUEJA",
                status: "En Revisión",
                content: "Vengo a reportar el grave estado de la vía en el barrio El Poblado...",
                likes: 24,
                supports: 18,
                follows: 12,
                comments: 8,
                tags: ["#Vías", "#SanAntonio", "#Infraestructura"],
                location: "El Poblado, Rionegro - Antioquia",
                timestamp: "Hace 2 horas"
            }
        ];

        // Modal functions
        function showLogin() {
            document.getElementById('registerModal').style.display = 'none';
            document.getElementById('loginModal').style.display = 'block';
        }

        function showRegister() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('registerModal').style.display = 'none';
        }

        // Post interactions
        function toggleLike(button) {
            button.classList.toggle('liked');
            const icon = button.querySelector('i');
            const text = button.querySelector('span');
            
            if (button.classList.contains('liked')) {
                icon.style.color = '#ff6b6b';
                text.textContent = 'Te gusta';
                showNotification('¡Te gusta esta publicación!', 'success');
            } else {
                icon.style.color = '';
                text.textContent = 'Me gusta';
            }
        }

        function toggleSupport(button) {
            button.classList.toggle('supported');
            const icon = button.querySelector('i');
            const text = button.querySelector('span');
            
            if (button.classList.contains('supported')) {
                icon.style.color = '#42b883';
                text.textContent = 'Apoyando';
                showNotification('¡Estás apoyando esta causa!', 'success');
            } else {
                icon.style.color = '';
                text.textContent = 'Apoyo';
            }
        }

        function toggleFollow(button) {
            button.classList.toggle('following');
            const icon = button.querySelector('i');
            const text = button.querySelector('span');
            
            if (button.classList.contains('following')) {
                icon.style.color = '#feca57';
                text.textContent = 'Siguiendo';
                showNotification('¡Ahora sigues esta PQR!', 'success');
            } else {
                icon.style.color = '';
                text.textContent = 'Seguir';
            }
        }

        function showComments(button) {
            showNotification('Función de comentarios en desarrollo', 'info');
        }

        // Post creation
        function attachPhoto() {
            showNotification('Función de adjuntar foto en desarrollo', 'info');
        }

        function addLocation() {
            showNotification('Función de agregar ubicación en desarrollo', 'info');
        }

        function addTag() {
            showNotification('Función de agregar etiquetas en desarrollo', 'info');
        }

        function setVisibility(type) {
            const buttons = document.querySelectorAll('.visibility-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            
            if (type === 'public') {
                buttons[0].classList.add('active');
            } else {
                buttons[1].classList.add('active');
            }
        }

        function publishPost() {
            const textarea = document.querySelector('.post-creator textarea');
            const content = textarea.value.trim();
            
            if (!content) {
                showNotification('Por favor, escribe el contenido de tu PQR', 'error');
                return;
            }
            
            // Simulate post creation
            textarea.value = '';
            showNotification('¡PQR publicada exitosamente!', 'success');
            
            // Here you would typically send the data to a server
            setTimeout(() => {
                showNotification('Tu PQR ha sido asignada el número #2024-' + Math.floor(Math.random() * 1000), 'info');
            }, 2000);
        }

        // Navigation functions
        function showFeed() {
            showNotification('Mostrando feed principal', 'info');
        }

        function showMyPosts() {
            showNotification('Mostrando tus PQR', 'info');
        }

        function showNews() {
            showNotification('Mostrando noticias oficiales', 'info');
        }

        function showHelp() {
            showNotification('Mostrando centro de ayuda', 'info');
        }

        function showProfile() {
            showNotification('Mostrando perfil de usuario', 'info');
        }

        function showNotifications() {
            showNotification('Mostrando notificaciones', 'info');
        }

        // Filter functions
        function filterByType(type) {
            if (type === 'all') {
                showNotification('Mostrando todas las PQR', 'info');
            } else {
                showNotification(`Filtrando por: ${type}`, 'info');
            }
        }

        function filterByLocation(location) {
            showNotification(`Filtrando por ubicación: ${location}`, 'info');
        }

        // Quick actions
        function showEmergencyReport() {
            showNotification('Abriendo formulario de emergencia', 'info');
        }

        function showStatusTracker() {
            showNotification('Abriendo seguimiento de PQR', 'info');
        }

        function showContactInfo() {
            showNotification('Mostrando información de contacto', 'info');
        }

        // Notification system
        function showNotification(message, type = 'info') {
            // Create notification element
            const notification = document.createElement('div');
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                padding: 15px 20px;
                border-radius: 10px;
                color: white;
                font-weight: bold;
                z-index: 10001;
                opacity: 0;
                transform: translateY(-20px);
                transition: all 0.3s ease;
                max-width: 300px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.3);
            `;
            
            // Set color based on type
            switch (type) {
                case 'success':
                    notification.style.background = 'linear-gradient(135deg, #42b883, #369870)';
                    break;
                case 'error':
                    notification.style.background = 'linear-gradient(135deg, #ff6b6b, #ee5a52)';
                    break;
                case 'info':
                default:
                    notification.style.background = 'linear-gradient(135deg, #4267B2, #365899)';
                    break;
            }
            
            notification.textContent = message;
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.opacity = '1';
                notification.style.transform = 'translateY(0)';
            }, 10);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 3000);
        }

        // Form submissions
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            if (email && password) {
                showNotification('¡Inicio de sesión exitoso!', 'success');
                closeModal();
            } else {
                showNotification('Por favor, completa todos los campos', 'error');
            }
        });

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fullName = document.getElementById('fullName').value;
            const email = document.getElementById('regEmail').value;
            const phone = document.getElementById('phone').value;
            const address = document.getElementById('address').value;
            const password = document.getElementById('regPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;
            
            if (password !== confirmPassword) {
                showNotification('Las contraseñas no coinciden', 'error');
                return;
            }
            
            if (fullName && email && phone && address && password) {
                showNotification('¡Cuenta creada exitosamente!', 'success');
                closeModal();
                setTimeout(() => {
                    showNotification('Se ha enviado un correo de verificación', 'info');
                }, 1500);
            } else {
                showNotification('Por favor, completa todos los campos', 'error');
            }
        });

        // Auto-resize textarea
        document.querySelector('.post-creator textarea').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });

        // Initialize app
        document.addEventListener('DOMContentLoaded', function() {
            showNotification('¡Bienvenido a PQR Ciudadana!', 'success');
            
            // Simulate real-time updates
            setInterval(() => {
                const stats = document.querySelectorAll('.stat-number');
                stats.forEach(stat => {
                    const currentValue = parseInt(stat.textContent.replace(',', ''));
                    const newValue = currentValue + Math.floor(Math.random() * 3);
                    stat.textContent = newValue.toLocaleString();
                });
            }, 30000);
        });

        // Click outside modal to close
        window.addEventListener('click', function(e) {
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            
            if (e.target === loginModal) {
                closeModal();
            }
            if (e.target === registerModal) {
                closeModal();
            }
        });
    