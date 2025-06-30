function openEditModal(task) {
  document.getElementById('editTaskId').value = task.id;
  document.getElementById('editTaskTitle').value = task.title;
  document.getElementById('editTaskDescription').value = task.description;
  document.getElementById('editTaskDeadline').value = task.deadline;
  document.getElementById('editTaskImportance').value = task.importance;

  document.getElementById('editTaskModal').classList.remove('hidden');
}

function closeEditModal() {
  document.getElementById('editTaskModal').classList.add('hidden');
}