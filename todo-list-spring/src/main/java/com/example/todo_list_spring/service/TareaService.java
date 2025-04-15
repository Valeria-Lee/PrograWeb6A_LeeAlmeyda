package com.example.todo_list_spring.service;

import com.example.todo_list_spring.models.Tarea;
import com.example.todo_list_spring.repository.TareaRepository;
import org.springframework.stereotype.Service;

import java.util.List;
import java.util.Map;
import java.util.Optional;

@Service
public class TareaService {
    private final TareaRepository tareaRepository;

    public TareaService(TareaRepository tareaRepository) {
        this.tareaRepository = tareaRepository;
    }

    public List<Tarea> obtenerTodas() {
        return tareaRepository.findAll();
    }

    public Optional<Tarea> obtenerPorId(Long id) {
        return tareaRepository.findById(id);
    }

    public Tarea guardar(Tarea tarea) {
        return tareaRepository.save(tarea);
    }

    public Tarea actualizar(Long id, Tarea tareaActualizada) {
        return tareaRepository.findById(id).map(tarea -> {
            tarea.setTitulo(tareaActualizada.getTitulo());
            tarea.setDescripcion(tareaActualizada.getDescripcion());
            tarea.setCompletada(tareaActualizada.isCompletada());

            return tareaRepository.save(tarea);

        }).orElseThrow(() -> new RuntimeException("Tarea no encontrada"));
    }

    public Tarea actualizarParcial(Long id, Map<String, Object> campos) {
        return tareaRepository.findById(id).map(tarea -> {
            if (campos.containsKey("titulo")) {
                tarea.setTitulo((String) campos.get("titulo"));
            }
            if (campos.containsKey("descripcion")) {
                tarea.setDescripcion((String) campos.get("descripcion"));
            }
            if (campos.containsKey("completada")) {
                tarea.setCompletada((boolean) campos.get("completada"));
            }
            return tareaRepository.save(tarea);
        }).orElseThrow(() -> new RuntimeException("Tarea no encontrada"));
    }

    public void eliminar(Long id) {
        tareaRepository.deleteById(id);
    }
}
