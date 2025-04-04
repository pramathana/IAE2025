from fastapi import FastAPI # type: ignore
from pydantic import BaseModel # type: ignore

app = FastAPI()

# Model data karyawan
class Employee(BaseModel):
    id: int
    name: str
    position: str

# Simulasi database sederhana
employees = []

@app.get("/employees")
def get_employees():
    return employees

@app.get("/employees/{id}")
def get_employee(id: int):
    for emp in employees:
        if emp.id == id:
            return emp
    return {"error": "Employee not found"}

@app.post("/employees")
def add_employee(employee: Employee):
    employees.append(employee)
    return {"message": "Employee added", "data": employee}