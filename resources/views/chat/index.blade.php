@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4 max-w-xl">
    <h1 class="text-2xl font-semibold mb-4">ChatGPT</h1>

    <div id="chat-box" class="border rounded p-4 h-96 overflow-y-auto bg-white">
        <!-- Les messages User / Bot apparaîtront ici -->
    </div>

    <form id="chat-form" class="mt-4 flex">
        <input type="text" id="prompt" name="prompt"
            class="flex-1 border rounded-l px-4 py-2 focus:outline-none"
            placeholder="Écris ta question..." autocomplete="off">
        <button type="submit"
            class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
            Envoyer
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const chatBox = document.getElementById('chat-box');
    const chatForm = document.getElementById('chat-form');
    const promptInput = document.getElementById('prompt');

    // Ajoute un message dans le chat (role "user" ou "bot")
    function appendMessage(role, text) {
        const messageEl = document.createElement('div');
        messageEl.classList.add('mb-3', 'p-2', 'rounded');

        if (role === 'user') {
            messageEl.classList.add('bg-gray-100', 'text-right');
        } else {
            messageEl.classList.add('bg-blue-50', 'text-left');
        }

        messageEl.innerText = text;
        chatBox.appendChild(messageEl);
        chatBox.scrollTop = chatBox.scrollHeight;
    }

    chatForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const prompt = promptInput.value.trim();
        if (!prompt) return;

        // Affiche d'abord le message utilisateur
        appendMessage('user', prompt);
        promptInput.value = '';
        promptInput.disabled = true;

        // Appel AJAX à /chat/ask
        fetch("{{ route('chat.ask') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ prompt: prompt })
        })
        .then(response => response.json())
        .then(data => {
            appendMessage('bot', data.answer);
            promptInput.disabled = false;
            promptInput.focus();
        })
        .catch(error => {
            appendMessage('bot', 'Erreur : impossible de récupérer la réponse.');
            promptInput.disabled = false;
            promptInput.focus();
        });
    });
});
</script>
@endsection
