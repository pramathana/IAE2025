from fastapi import FastAPI # type: ignore
from pydantic import BaseModel # type: ignore
from datetime import datetime

app = FastAPI()

class Attendance(BaseModel):
    employee_id: int
    date: str
    time_in: str
    time_out: str = None

attendance_records = []

@app.post("/attendance")
def record_attendance(attendance: Attendance):
    attendance_records.append(attendance)
    return {"message": "Attendance recorded", "data": attendance}

@app.get("/attendance/{employee_id}")
def get_attendance(employee_id: int):
    records = [record for record in attendance_records if record.employee_id == employee_id]
    return records