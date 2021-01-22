const form = document.getElementById('form');
const input = document.getElementById('input');
const todosUL = document.getElementById('todos');

const addbtn = document.getElementsByClassName('btn-primary')[0];
const deletebtncompleted = document.getElementsByClassName('btn-danger')[0];

const todos = JSON.parse(localStorage.getItem('todos'));

if (todos) {
    todos.forEach(todo => {
        addTodo(todo);
    });
}

form.addEventListener('submit', (e) => {
    e.preventDefault();
    addTodo();
})

addbtn.addEventListener('click', addTodo, false);

function addTodo(todo) {
    let TodoText = input.value;
    if (todo) {
        TodoText = todo.text;
    }

    if (TodoText) {
        const todoEl = document.createElement('li');
        if (todo && todo.completed) {
            todoEl.classList.add('completed');
        }
        todoEl.innerText = TodoText;

        deletebtncompleted.addEventListener('click', () => {
            if (todoEl.classList.contains('completed')) {
                todoEl.remove();
                updateL5();
            }
        })

        todoEl.addEventListener('click', () => {
            todoEl.classList.toggle('completed');
            updateL5();
        });

        todoEl.addEventListener('contextmenu', (e) => {
            e.preventDefault();
            todoEl.remove();

            updateL5();
        })

        todosUL.appendChild(todoEl);

        input.value = "";
        updateL5();
    }
}

function updateL5() {
    const todosEl = document.querySelectorAll('li');

    const todos = [];

    todosEl.forEach(todosEl => {
        todos.push({
            text: todosEl.innerText,
            completed: todosEl.classList.contains('completed')
        })
    });

    localStorage.setItem('todos', JSON.stringify(todos));
}

//Time style
let time = new Date();
hourlytime = time.getHours();
if (hourlytime > 5 && hourlytime <= 19) {
    document.getElementById('defaultcss').setAttribute('href', 'style.css');
} else {
    document.getElementById('defaultcss').setAttribute('href', 'night.css');
}