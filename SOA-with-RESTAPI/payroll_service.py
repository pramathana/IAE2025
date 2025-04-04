from fastapi import FastAPI # type: ignore
from pydantic import BaseModel # type: ignore
import requests # type: ignore

app = FastAPI()

class Payroll(BaseModel):
    employee_id: int
    total_salary: float
    period: str

payroll_records = []

@app.get("/payroll/{employee_id}")
def get_payroll(employee_id: int):
    for record in payroll_records:
        if record.employee_id == employee_id:
            return {
                "employee_id": record.employee_id,
                "total_salary": record.total_salary,
                "period": record.period
            }
    return {"error": "Payroll data not found for this employee"}

@app.post("/payroll")
def save_payroll(payroll: Payroll):
    payroll_records.append(payroll)
    return {"message": "Payroll saved", "data": payroll}